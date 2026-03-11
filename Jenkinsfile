node {

    environment {
        PATH = "/usr/local/bin:${env.PATH}"
    }

    stage('Checkout Code') {
        checkout scm
    }

    stage('Install Dependency') {
        dir('src') {
            sh '/usr/local/bin/composer install --no-interaction --prefer-dist --no-scripts'
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
