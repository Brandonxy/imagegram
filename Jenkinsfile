pipeline {
    agent { docker { image 'php:8.1.0-alpine' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
            }
        }
    }
}
