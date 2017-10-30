FROM node:latest

RUN npm install -g gulp bower \
&&  npm install gulp -D

ENV user node
USER $user

CMD ["bower", "install"]
CMD ["gulp"]