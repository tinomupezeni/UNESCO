# deploy_master.ps1
$ErrorActionPreference = "Stop"

# 1. Configuration variables
$PROJECT_DIR = "C:\inetpub\wwwroot\unesco-country" # Update this to the actual deployment path on the VM
$DOCKER_COMPOSE_FILE = "docker-compose.yml"
$HEALTH_ENDPOINT = "http://localhost:8000" # Update to the actual production domain or health check route

Write-Host "Starting Deployment Pipeline..." -ForegroundColor Cyan

# 2. Pull Latest Code
Set-Location -Path $PROJECT_DIR
git fetch origin main
git reset --hard origin/main

# 3. Build New Images
Write-Host "Building Docker images..." -ForegroundColor Cyan
docker compose -f $DOCKER_COMPOSE_FILE build

# 4. Install Dependencies & Build Frontend
Write-Host "Installing Composer dependencies..." -ForegroundColor Cyan
docker compose -f $DOCKER_COMPOSE_FILE run --rm app composer install --no-interaction --prefer-dist --optimize-autoloader

Write-Host "Building frontend assets..." -ForegroundColor Cyan
docker compose -f $DOCKER_COMPOSE_FILE run --rm node sh -c "npm install && npm run build"

# 5. Pre-Flight Database Migrations
Write-Host "Running Database Migrations..." -ForegroundColor Cyan
docker compose -f $DOCKER_COMPOSE_FILE run --rm app php artisan migrate --force

# 6. Zero-Downtime Deployment
Write-Host "Deploying new containers..." -ForegroundColor Cyan
docker compose -f $DOCKER_COMPOSE_FILE up -d --wait

# 7. Post-Deployment Optimization
Write-Host "Caching Laravel configuration & routes..." -ForegroundColor Cyan
docker compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan optimize

# 8. Health Check Verification Gate
$MAX_RETRIES = 10
$RETRY_COUNT = 0
$isHealthy = $false

Write-Host "Verifying application health..." -ForegroundColor Cyan

while ($RETRY_COUNT -lt $MAX_RETRIES) {
    $STATUS_CODE = 0
    try {
        $response = Invoke-WebRequest -Uri $HEALTH_ENDPOINT -UseBasicParsing -ErrorAction SilentlyContinue
        $STATUS_CODE = $response.StatusCode
    } catch {
        if ($_.Exception.Response) {
            $STATUS_CODE = $_.Exception.Response.StatusCode
        }
    }

    if ($STATUS_CODE -eq 200 -or $STATUS_CODE -eq 302) {
        Write-Host "✅ Deployment Successful and Healthy!" -ForegroundColor Green
        
        Write-Host "Pruning old docker images..." -ForegroundColor Cyan
        docker image prune -f
        $isHealthy = $true
        break
    }
    
    $attempt = $RETRY_COUNT + 1
    Write-Host "Waiting for service to be healthy... (Attempt $attempt/$MAX_RETRIES)" -ForegroundColor Yellow
    Start-Sleep -Seconds 5
    $RETRY_COUNT++
}

# 9. Rollback Mechanism
if (-not $isHealthy) {
    Write-Host "❌ Deployment Failed Health Check! Initiating Rollback..." -ForegroundColor Red
    
    # Revert git commit and redeploy
    git reset --hard HEAD~1
    docker compose -f $DOCKER_COMPOSE_FILE build
    docker compose -f $DOCKER_COMPOSE_FILE up -d --wait
    
    Write-Host "⚠️ Rollback Complete. Check logs for failure reasons." -ForegroundColor Yellow
    exit 1
}

exit 0
