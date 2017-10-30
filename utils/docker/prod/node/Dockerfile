FROM node:latest

RUN npm install gulp \
&& npm install bower

ENV user node
USER $user

CMD ["bower", "install"]
CMD ["gulp"]