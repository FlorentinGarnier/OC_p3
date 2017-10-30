FROM node:latest

RUN npm install -g gulp \
&& npm install -g bower

ENV user node
USER $user

CMD ["bower", "install"]
CMD ["gulp"]