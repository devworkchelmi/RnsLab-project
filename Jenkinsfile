pipeline {
    agent any

    stage('Install') {
    steps {
        echo '📦 Installation des dépendances PHP...'
        dir('Rnslab/rnslab_project/rnslab_app') {
            sh 'composer install'
        }
    }
}
    stages {
        stage('Hello') {
            steps {
                echo ' Pipeline Jenkins bien détectée !'
            }
        }
       stage('Test') {
    steps {
        echo '🧪 Exécution des tests...'
        dir('Rnslab/rnslab_project/rnslab_app') {
            sh './vendor/bin/phpunit --testdox'
        }
    }
}


stage('Docker Build') {
    steps {
        echo ' Construction de l’image Docker...'
        sh "docker build -t ghcr.io/devworkchelmi/rnslab:${BUILD_NUMBER} ."
    }
}

stage('Tag Repo') {
    steps {
        echo ' Tag du dépôt GitHub...'
        sh '''
        git config user.name "Jenkins"
        git config user.email "jenkins@local"
        git tag v${BUILD_NUMBER}
        git push origin v${BUILD_NUMBER}
        '''
    }
}

stage('Publish Docker') {
    steps {
        echo ' Envoi sur GitHub Packages...'
        withCredentials([string(credentialsId: 'github-token', variable: 'TOKEN')]) {
            sh '''
            echo $TOKEN | docker login ghcr.io -u devworkchelmi --password-stdin
            docker push ghcr.io/devworkchelmi/rnslab:${BUILD_NUMBER}
            '''
        }
    }
}


    }
}
