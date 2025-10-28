# Étend l'image Jenkins officielle
FROM jenkins/jenkins:lts

# Passe temporairement en mode root
USER root

# Installe curl, git et Node.js via le script officiel
RUN apt-get update && \
    apt-get install -y curl git && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Reviens à l'utilisateur Jenkins
USER jenkins
