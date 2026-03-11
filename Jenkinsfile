node {

    stage('Checkout Code') {
        checkout scm
    }

    stage('Install Dependency') {
        sh '/usr/local/bin/composer install --no-interaction --prefer-dist --no-scripts'
    }

    stage('Prepare Laravel') {
        sh 'cp .env.example .env || true'
        sh 'php artisan key:generate || true'
    }

    stage('Laravel Check') {
        sh 'php artisan --version'
    }

}
