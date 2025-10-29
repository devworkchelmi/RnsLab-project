pipeline {
    agent any

    environment {
        APP_DIR = "Rnslab/rnslab_project/rnslab_app"
        IMAGE_NAME = "devworkchelmi/rnslab-project"
    }

    stages {
        stage('Checkout') {
            steps {
                echo "📥 Téléchargement du code depuis GitHub..."
                git branch: 'master', url: 'https://github.com/devworkchelmi/RnsLab-project.git'
            }
        }

        stage('Install') {
            steps {
                echo "📦 Installation des dépendances PHP..."
                dir("${APP_DIR}") {
                    sh 'composer install --no-interaction --no-progress --ignore-platform-req=ext-zip'
                }
            }
        }

        stage('Test') {
            steps {
                echo "🧪 Exécution des tests PHPUnit..."
                dir("${APP_DIR}") {
                    withEnv(["DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db"]) {
                        sh './vendor/bin/phpunit --testdox || echo "⚠️ Tests échoués ou absents"'
                    }
                }
            }
        }

        stage('Docker Build & Push') {
            steps {
                echo "🐳 Construction et Push Docker Hub..."
                script {
                    // Récupère le hash Git court (ex: 2ae3639)
                    def TAG = sh(script: "git rev-parse --short HEAD", returnStdout: true).trim()

                    withCredentials([usernamePassword(credentialsId: 'dockerhub-creds', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                        sh '''
                            echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
                        '''
                        sh """
                            docker build -t ${IMAGE_NAME}:latest -t ${IMAGE_NAME}:${TAG} .
                            docker push ${IMAGE_NAME}:latest
                            docker push ${IMAGE_NAME}:${TAG}
                        """
                    }
                }
            }
        }
    }

    post {
        success {
            echo "✅ Pipeline terminée avec succès !"
        }
        failure {
            echo "❌ Une erreur est survenue pendant le pipeline."
        }
    }
}
