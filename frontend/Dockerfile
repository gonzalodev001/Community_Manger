FROM node:16.14-alpine AS build-stage
#ARG UID
#EXPOSE $UID
#RUN adduser -u ${UID} --disabled-password --gecos "" appuserr2
WORKDIR /frontend
#Comment down line
COPY package*.json ./
COPY quasar.conf.js ./
RUN npm install -g @vue/cli
RUN npm install -g @quasar/cli
#RUN npm install --global yarn
#Comment down line
RUN npm install
#Comment down line
COPY ./ .
#Descomment the line RUN quasar build when is the first time build docker image
#Comment down line for enviroment production after build docker iamge
#RUN quasar build
#Comment down lines to final production-stage when is the first time build docker image
#production stage
FROM nginx:1.21 AS production-stage
#COPY default.conf /etc/nginx/conf.d/
RUN mkdir /frontend
COPY --from=build-stage /frontend/dist/spa /usr/share/nginx/html
COPY default.conf /etc/nginx/conf.d/
EXPOSE 80
#CMD ["nginx", "-g", "daemon off;"]
