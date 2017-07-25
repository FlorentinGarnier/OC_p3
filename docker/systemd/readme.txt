1: Create service file inside the path : /etc/systemd/system/

vim /etc/systemd/system/docker-container@lamp_server.service

2: Reload systemctl 

systemctl daemon-reload

3: Start the service 

systemctl start docker-container@lamp_server.service

4: Enable the service at system startup 

systemctl enable docker-container@lamp_server.service
