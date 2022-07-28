def dockerPublisherName = "mohanraj612"
def dockerRepoName = "php-app-pipeline-demo"
def apacheLocalImage = "apache2-image"
def mysqlLocalImage = "mysql-image"

def gitRepoName = "https://github.com/mohanrd612/php-app-pipeline-demo"


properties([pipelineTriggers([githubPush()])])

pipeline {
    agent {
        node {
            label 'master'
        }
    }

    stages {

        stage('Checkout') {
            steps {
                git branch: "**", url: "${gitRepoName}"

                script {
                    branch = "${GIT_BRANCH}".split('/')[0]
                }
                echo "CHECK OUT BRANCH:${branch}"
            }
        }

        stage('Build') {
            steps {
                script {
                    // if (branch == 'main' || branch == 'dev'){
                        sh "sudo docker rmi ${apacheLocalImage} || true"
                        sh "sudo docker build -t ${apacheLocalImage} apache/"

                        sh "sudo docker rmi ${mysqlLocalImage} || true"
                        sh "sudo docker build -t ${mysqlLocalImage} mysql/"
                        sh "/usr/local/bin/docker-compose -f docker-compose.yml up -d"
               //     }
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // if (branch == 'main' || branch == 'dev'){
                        sh "sudo docker tag ${apacheLocalImage} ${dockerPublisherName}/${dockerRepoName}:${apacheLocalImage}V.${BUILD_NUMBER}"
                        sh "sudo docker tag ${mysqlLocalImage} ${dockerPublisherName}/${dockerRepoName}:${mysqlLocalImage}V.${BUILD_NUMBER}"
                        
                        // withCredentials([usernamePassword( credentialsId: 'docker-login', usernameVariable: 'USER', passwordVariable: 'PASSWORD')]) {
                        // def registry_url = "https://hub.docker.com/"
                        // sh "docker login -u $USER -p $PASSWORD"
                        // sh "docker push ${dockerPublisherName}/${dockerRepoName}"
                        // }
                        
                  //  } 
                }
            }
        }
    }
}
