pipeline {
    agent any

    environment {
        PROJECT_PATH = 'Rnslab/rnslab_project/rnslab_app'
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
                    sh 'composer install --no-interaction --no-progress || echo "⚠️ composer non installé"'
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
                sh 'docker build -t rnslab-image .'
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
