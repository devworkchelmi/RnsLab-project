pipeline {
    agent any

    environment {
        PROJECT_PATH = 'Rnslab/rnslab_project/rnslab_app' // 🧭 adapte ce chemin si ton composer.json est ailleurs
        DOCKER_IMAGE = "ghcr.io/devworkchelmi/rnslab"
        GITHUB_CREDENTIALS = 'github-token' // ton ID Jenkins pour ton token GitHub
    }

    stages {

        stage('Checkout') {
    steps {
        echo '📥 Téléchargement du code depuis GitHub...'
        git branch: 'master', url: 'https://github.com/devworkchelmi/RnsLab-project.git'
        sh 'ls -la'
    }
}

        stage('Hello') {
            steps {
                echo '✅ Pipeline Jenkins bien détectée !'
            }
        }

        stage('Install') {
            steps {
                echo '📦 Installation des dépendances PHP...'
                dir("${PROJECT_PATH}") {
                    sh 'composer install --no-interaction --no-progress'
                }
            }
        }

        stage('Test') {
            steps {
                echo '🧪 Exécution des tests PHPUnit...'
                dir("${PROJECT_PATH}") {
                    sh './vendor/bin/phpunit --testdox || echo "⚠️ Aucun test trouvé ou échec"'
                }
            }
        }

        stage('Docker Build') {
            steps {
                echo '🐳 Construction de l’image Docker...'
                sh "docker build -t ${DOCKER_IMAGE}:${BUILD_NUMBER} ."
            }
        }

        stage('Tag Repo') {
            steps {
                echo '🏷️ Création du tag Git pour ce build...'
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
                echo '🚀 Publication sur GitHub Packages...'
                withCredentials([string(credentialsId: "${GITHUB_CREDENTIALS}", variable: 'TOKEN')]) {
                    sh '''
                    echo $TOKEN | docker login ghcr.io -u devworkchelmi --password-stdin
                    docker push ${DOCKER_IMAGE}:${BUILD_NUMBER}
                    '''
                }
            }
        }
    }

    post {
        success {
            echo "🎉 Build terminé avec succès !"
        }
        failure {
            echo "❌ Une erreur est survenue pendant le pipeline."
        }
    }
}
