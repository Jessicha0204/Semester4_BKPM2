node {

    stage('Checkout Code') {
        checkout scm
    }

    stage('Install Dependency') {
        sh '/usr/local/bin/composer install --no-interaction --prefer-dist --no-scripts --ignore-platform-reqs'
    }

    stage('Prepare Laravel') {
        sh 'cp .env.example .env || true'
        sh 'php artisan key:generate || true'
    }

    stage('Laravel Check') {
        sh 'php artisan --version'
    }

    stage('Deploy to Production') {
        sh '''
        cp -r . /var/www/html/ 2>/dev/null || true
        echo "Deploy selesai ke local container"
        '''
    }

}
