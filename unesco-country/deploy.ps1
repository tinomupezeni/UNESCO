# deploy_master.ps1
$ErrorActionPreference = "Stop"

# 1. Configuration variables
$SERVER = "dns@10.50.100.93"
$REMOTE_PROJECT_DIR = "/home/dns/Documents/unesco-country"

Write-Host "Starting Deployment Pipeline on Remote Server ($SERVER)..." -ForegroundColor Cyan

# Define the bash script to be executed remotely
$RemoteScript = @'
set -e

PROJECT_DIR="/home/dns/Documents/unesco-country"
DOCKER_COMPOSE_FILE="docker-compose.yml"
HEALTH_ENDPOINT="http://localhost:8000"

echo "Connected to server. Starting deployment..."

# 2. Pull Latest Code
cd /home/dns/Documents/unesco-country
git fetch origin main
git reset --hard origin/main

# Navigate into the subfolder containing the Laravel app and docker-compose.yml
cd unesco-country

# 3. Build New Images
echo "Building Docker images..."
docker rmi unesco-country-app:latest || true
docker compose -f $DOCKER_COMPOSE_FILE build

# 4. Install Dependencies & Build Frontend
echo "Installing Composer dependencies..."
docker compose -f $DOCKER_COMPOSE_FILE run --rm app composer install --no-interaction --prefer-dist --optimize-autoloader

echo "Building frontend assets..."
docker compose -f $DOCKER_COMPOSE_FILE run --rm node sh -c "npm install && npm run build"

# 5. Pre-Flight Database Migrations
echo "Running Database Migrations..."
docker compose -f $DOCKER_COMPOSE_FILE run --rm app php artisan migrate --force

# 6. Zero-Downtime Deployment
echo "Deploying new containers..."
docker compose -f $DOCKER_COMPOSE_FILE up -d --wait

# 7. Post-Deployment Optimization
echo "Caching Laravel configuration & routes..."
docker compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan optimize

# 8. Health Check Verification Gate
MAX_RETRIES=10
RETRY_COUNT=0

echo "Verifying application health..."
while [ $RETRY_COUNT -lt $MAX_RETRIES ]; do
    STATUS_CODE=$(curl -o /dev/null -s -w "%{http_code}\n" $HEALTH_ENDPOINT)
    
    if [ "$STATUS_CODE" -eq 200 ] || [ "$STATUS_CODE" -eq 302 ]; then
        echo "✅ Deployment Successful and Healthy!"
        echo "Pruning old docker images..."
        docker image prune -f
        exit 0
    fi
    
    echo "Waiting for service to be healthy... (Attempt $((RETRY_COUNT+1))/$MAX_RETRIES)"
    sleep 5
    RETRY_COUNT=$((RETRY_COUNT+1))
done

# 9. Rollback Mechanism
echo "❌ Deployment Failed Health Check! Initiating Rollback..."
git reset --hard HEAD~1
docker compose -f $DOCKER_COMPOSE_FILE build
docker compose -f $DOCKER_COMPOSE_FILE up -d --wait
echo "⚠️ Rollback Complete. Check logs for failure reasons."
exit 1
'@

# Execute the script over SSH
ssh $SERVER $RemoteScript

if ($LASTEXITCODE -ne 0) {
    Write-Host "Remote deployment pipeline failed." -ForegroundColor Red
    exit $LASTEXITCODE
}

Write-Host "Remote deployment pipeline finished successfully." -ForegroundColor Green
exit 0
