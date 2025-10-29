# Base Jenkins image
FROM jenkins/jenkins:lts

USER root

RUN apt-get update && \
    apt-get install -y curl git && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    # Fix permissions
    chown -R jenkins:jenkins /var/jenkins_home

# Définir explicitement le volume
VOLUME /var/jenkins_home

USER jenkins

EXPOSE 8080
EXPOSE 50000