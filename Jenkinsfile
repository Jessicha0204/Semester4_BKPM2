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

        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {

            sshagent (credentials: ['ssh-prod']) {

                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" >> ~/.ssh/known_hosts'

                sh '''
                rsync -rav --delete ./ ubuntu@$PROD_HOST:/home/ubuntu/prod.kelasdevops.xyz/ \
                --exclude=.env \
                --exclude=storage \
                --exclude=.git
                '''

            }
        }
    }

}
