node {

    checkout scm

    stage("Load Secret File") {
        withCredentials([file(credentialsId: 'env-file', variable: 'ENV_FILE')]) {
            sh '''
            cp $ENV_FILE src/.env
            echo "Secret file berhasil dimuat"
            '''
        }
    }

    stage("Build") {
        docker.image('composer:2').inside('-u root') {
            sh '''
            cd src
            rm -f composer.lock
            composer install
            '''
        }
    }

    stage("Testing") {
        docker.image('ubuntu').inside('-u root') {
            sh 'echo "Pipeline Jenkins berhasil dijalankan"'
        }
    }

}