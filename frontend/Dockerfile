FROM node:16.14-alpine AS build-stage
#ARG UID
#EXPOSE $UID
#RUN adduser -u ${UID} --disabled-password --gecos "" appuserr2
WORKDIR /frontend
#Comment down line
COPY package*.json ./
RUN npm install -g @vue/cli
#Comment down line
RUN npm install
#Comment down line
COPY ./ .
#Comment down line
RUN npm run build
#Comment down lines to final
#production stage
FROM nginx:1.21 AS production-stage
#COPY default.conf /etc/nginx/conf.d/
RUN mkdir /frontend
COPY --from=build-stage /frontend/dist /usr/share/nginx/html
COPY default.conf /etc/nginx/conf.d/
EXPOSE 80
#CMD ["nginx", "-g", "daemon off;"]
