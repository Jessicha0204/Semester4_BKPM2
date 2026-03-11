node {

    stage('Checkout Code') {
        checkout scm
    }

    stage('Install Dependency') {
        dir('src') {
            sh 'composer install --no-interaction --prefer-dist --no-scripts'
        }
    }

    stage('Prepare Laravel') {
        dir('src') {
            sh 'cp .env.example .env || true'
            sh 'php artisan key:generate || true'
        }
    }

    stage('Laravel Check') {
        dir('src') {
            sh 'php artisan --version'
        }
    }

}
