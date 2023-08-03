FROM node:18.17-alpine AS build-stage
#ARG UID
#EXPOSE $UID
#RUN adduser -u ${UID} --disabled-password --gecos "" appuserr2
WORKDIR /frontend
#Comment down line
COPY package*.json ./

# Fix permissions for packages
#RUN npm config set unsafe-perm true

RUN npm install -g vite
#Comment down line
#RUN yarn install
RUN npm install

#Comment down line
COPY ./ .
#Descomment the line RUN quasar build when is the first time build docker image for deploment to server
#Comment down line for enviroment production after build docker iamge
RUN npm run build
#Comment down lines to final production-stage when is the first time build docker image
#production stage
FROM nginx:1.21 AS production-stage
#COPY default.conf /etc/nginx/conf.d/
RUN mkdir /frontend
COPY --from=build-stage /frontend/dist /usr/share/nginx/html
COPY default.conf /etc/nginx/conf.d/
EXPOSE 80
#CMD ["nginx", "-g", "daemon off;"]
