FROM node:latest

RUN npm install -g bower gulp\
&& npm install

ENV user node
USER $user

CMD ["bower", "install"]
CMD ["gulp"]