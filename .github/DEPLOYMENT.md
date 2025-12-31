# Deployment Guide

This repository is configured with automated deployment to production using GitHub Actions and Laravel Forge.

## Production URL
- **URL**: http://prashantrijal.com.np
- **Platform**: Laravel Forge (VPS Management)

## Deployment Workflows

### 1. Laravel Pint (Code Formatting)
- **File**: `.github/workflows/pint.yml`
- **Triggers**: Push and Pull Requests to `main`, `master`, `develop` branches
- **Action**: Automatically formats code using Laravel Pint and commits changes

### 2. Production Deployment via Laravel Forge
- **File**: `.github/workflows/deploy.yml`
- **Triggers**: 
  - Push to `main` or `master` branch
  - Manual trigger via GitHub Actions UI
- **Action**: Triggers Laravel Forge deployment webhook

## Required GitHub Secrets

To enable deployment, configure the following secret in your GitHub repository:

Go to: `Settings` → `Secrets and variables` → `Actions` → `New repository secret`

### Required Secret:

| Secret Name | Description | Example |
|------------|-------------|---------|
| `FORGE_DEPLOY_WEBHOOK_URL` | Laravel Forge deployment webhook URL | `https://forge.laravel.com/servers/xxxxx/sites/xxxxx/deploy/http?token=xxxxx` |

### How to Get Your Forge Deployment Webhook URL

1. Log in to your [Laravel Forge](https://forge.laravel.com) dashboard
2. Navigate to your server
3. Select your site (prashantrijal.com.np)
4. Go to the **"Apps"** tab or **"Deployment"** section
5. Copy the **Deploy Webhook URL**
6. Paste it into the `FORGE_DEPLOY_WEBHOOK_URL` secret in GitHub

The webhook URL format looks like:
```
https://forge.laravel.com/servers/{server-id}/sites/{site-id}/deploy/http?token={your-token}
```

## Deployment Process

The deployment workflow performs the following steps:

1. ✅ Checks out the code
2. ✅ Triggers Laravel Forge deployment webhook
3. ✅ Laravel Forge then automatically:
   - Pulls latest code from Git
   - Installs/updates Composer dependencies
   - Installs/updates NPM dependencies
   - Builds frontend assets
   - Runs database migrations (if configured)
   - Clears and optimizes caches
   - Restarts PHP-FPM and queue workers (if applicable)
   - Reloads OPcache

## Laravel Forge Configuration

Laravel Forge manages your server, so most configuration is done through the Forge dashboard.

### Deployment Script

In your Laravel Forge dashboard, you should configure your deployment script. Here's a recommended script:

**Go to:** Your Site → Apps → Deployment Script

```bash
cd /home/forge/prashantrijal.com.np

# Put application in maintenance mode (optional)
php artisan down --retry=60 || true

# Pull latest changes
git pull origin $FORGE_SITE_BRANCH

# Install/update composer dependencies
$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Install/update npm dependencies and build assets
npm ci
npm run build

# Clear and optimize
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Restart queue workers
php artisan queue:restart

# Bring application back online
php artisan up

echo "✅ Deployment completed!"
```

### Enable Quick Deploy

In your Forge site settings:
1. Go to **Apps** → **Git Repository**
2. Enable **"Quick Deploy"** if you want automatic deployments on every push
3. Or keep it disabled and use the GitHub Actions workflow for controlled deployments

### Environment Variables

Ensure your `.env` file is properly configured in Forge:
1. Go to **Environment** tab in your site
2. Configure all necessary environment variables
3. Make sure `APP_ENV=production` and `APP_DEBUG=false`

## Manual Deployment

You have multiple options for manual deployment:

### Option 1: GitHub Actions (Recommended)
1. Go to `Actions` tab in GitHub
2. Select `Deploy to Production` workflow
3. Click `Run workflow`
4. Select the branch to deploy
5. Click `Run workflow` button

### Option 2: Laravel Forge Dashboard
1. Log in to [Laravel Forge](https://forge.laravel.com)
2. Navigate to your site
3. Go to **Apps** tab
4. Click **"Deploy Now"** button

### Option 3: Via Command Line
```bash
# Trigger deployment via webhook
curl -X POST "YOUR_FORGE_WEBHOOK_URL"
```

## Monitoring Deployment

### GitHub Actions:
- View deployment status in the `Actions` tab
- Each deployment creates a detailed summary
- Real-time logs available during deployment

### Laravel Forge:
- Go to your site in Forge dashboard
- Click **"Deployments"** to see deployment history
- View logs for each deployment
- Receive email notifications (if configured)

## Rollback

If you need to rollback a deployment:

### Via Laravel Forge Dashboard:
1. Go to your site in Forge
2. Navigate to **Deployments** tab
3. Find the previous successful deployment
4. Click the commit hash to see details
5. Use the SSH terminal or manual deploy option

### Via SSH:
```bash
# SSH into server via Forge
# Or use Forge's built-in terminal

cd /home/forge/prashantrijal.com.np

# Put in maintenance mode
php artisan down

# View git history
git log --oneline

# Reset to previous commit
git reset --hard <previous-commit-hash>

# Run deployment commands
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan queue:restart

# Bring back online
php artisan up
```

## Troubleshooting

### Deployment Webhook Fails
**Error:** `Deployment trigger failed with HTTP code: 403/404/500`

**Solutions:**
- Verify your `FORGE_DEPLOY_WEBHOOK_URL` secret is correct
- Check that the webhook URL hasn't expired or changed in Forge
- Ensure your Forge subscription is active
- Try regenerating the webhook URL in Forge dashboard

### Deployment Script Fails in Forge
**Check these common issues:**

1. **Composer Errors:**
   ```bash
   # SSH into server
   cd /home/forge/prashantrijal.com.np
   composer install --no-interaction --no-dev --optimize-autoloader
   ```

2. **NPM Build Errors:**
   ```bash
   # Check Node version (should be 20.x)
   node -v
   
   # Clear npm cache and retry
   rm -rf node_modules package-lock.json
   npm install
   npm run build
   ```

3. **Permission Errors:**
   Forge typically handles permissions, but if you encounter issues:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

4. **Migration Errors:**
   - Check `.env` file in Forge dashboard
   - Verify database credentials
   - Review logs in **Logs** section of Forge

### View Deployment Logs

**In Laravel Forge:**
1. Go to your site
2. Click **Deployments** tab
3. Click on the failed deployment
4. Review the output logs

**In GitHub Actions:**
1. Go to **Actions** tab
2. Select the failed workflow run
3. Click on the failed job
4. Review each step's output

### Quick Fixes

**Clear All Caches:**
```bash
# Via SSH
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

**Restart Services:**
- In Forge dashboard, go to **Server** → **Services**
- Restart PHP-FPM, Nginx, and Queue Workers

**Check Disk Space:**
```bash
df -h
```

## Support

For deployment issues, check:
1. **GitHub Actions logs** - Webhook trigger issues
2. **Laravel Forge deployment logs** - Server-side deployment issues  
3. **Application logs** - `storage/logs/laravel.log` (viewable in Forge)
4. **Server logs** - Available in Forge dashboard under **Logs**
5. **Forge documentation** - https://forge.laravel.com/docs

### Helpful Forge Features

- **Quick Deploy**: Auto-deploy on every push
- **Deploy Key**: Already configured by Forge
- **Health Checks**: Monitor site uptime
- **SSL Certificates**: Free Let's Encrypt SSL
- **Scheduler**: Cron jobs automatically configured
- **Queue Workers**: Managed by Supervisor

