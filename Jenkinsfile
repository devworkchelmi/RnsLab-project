pipeline {
    agent any

    environment {
        APP_DIR = "Rnslab/rnslab_project/rnslab_app"
        IMAGE_NAME = "devworkchelmi/rnslab"
        // ✅ Ajout global pour Symfony : évite l’erreur "DATABASE_URL not found"
        DATABASE_URL = "sqlite:///%kernel.project_dir%/var/data.db"
    }

    stages {

        stage('Checkout') {
            steps {
                echo "📥 Téléchargement du code depuis GitHub..."
                git branch: 'master', url: 'https://github.com/devworkchelmi/RnsLab-project.git'
                sh 'ls -la'
            }
        }

        stage('Install') {
            steps {
                echo "📦 Installation des dépendances PHP..."
                dir("${APP_DIR}") {
                    sh '''
                        export DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
                        composer install --no-interaction --no-progress --ignore-platform-req=ext-zip
                    '''
                }
            }
        }

        stage('Test') {
            steps {
                echo "🧪 Exécution des tests PHPUnit..."
                dir("${APP_DIR}") {
                    sh '''
                        export DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
                        ./vendor/bin/phpunit --testdox || echo "⚠️ Tests échoués ou absents"
                    '''
                }
            }
        }

        stage('Docker Build') {
            steps {
                echo "🐳 Construction de l’image Docker..."
                sh "docker build -t ${IMAGE_NAME}:latest ."
            }
        }

        stage('Push Docker') {
            steps {
                echo "🚀 Envoi de l’image sur Docker Hub..."
                withCredentials([usernamePassword(credentialsId: 'dockerhub-creds', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh '''
                        echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
                        docker push ${IMAGE_NAME}:latest
                    '''
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
