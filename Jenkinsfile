node {

    checkout scm

    stage("Load Secret File") {
        withCredentials([file(credentialsId: 'E41230154', variable: 'ENV_FILE')]) {
            sh '''
            cp $ENV_FILE .env
            echo "Secret file berhasil dimuat ke root project"
            '''
        }
    }

    stage("Build") {
        sh '''
        composer install --no-interaction --prefer-dist
        php artisan key:generate
        echo "Build berhasil"
        '''
    }

    stage("Testing") {
        sh '''
        echo "Testing berhasil"
        '''
    }

}
