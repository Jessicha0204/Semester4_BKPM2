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
        docker cp /var/jenkins_home/workspace/laravel-dev/. laravel_app1:/var/www/html/
        docker cp /var/jenkins_home/workspace/laravel-dev/. laravel_app2:/var/www/html/
        docker cp /var/jenkins_home/workspace/laravel-dev/. laravel_app3:/var/www/html/
        echo "Deploy selesai!"
        '''
    }

}
