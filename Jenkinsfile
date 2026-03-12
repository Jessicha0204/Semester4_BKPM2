node {

    checkout scm

    stage("Load Secret File") {
        withCredentials([file(credentialsId: 'E41230154', variable: 'ENV_FILE')]) {
            sh '''
            cp $ENV_FILE .env
            echo "Secret file berhasil dimuat ke root project"
            php artisan serve --host=0.0.0.0 --port=8092
            '''
        }
    }

    stage("Build") {
        sh '''
        cd src
        echo "Simulasi build berhasil"
        '''
    }

    stage("Testing") {
        sh 'echo "Pipeline Jenkins berhasil dijalankan"'
    }

}
