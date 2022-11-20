How to use the application.
1 - clone code in you repository
2 - in this project there are 4 different API that will do specific task
    - /api/writeSMS - write new message but not consume this message will be status "queue"
    - /api/consumeSMS - function will update to status "cosume"
    - /api/getAllSMSNoInQueue - function will get total numbers of data status "queue"
    - /api/getAllSMSInQueue - function will get all data status "queue"
3 - im using framework Laravel to make this app and also docker for running the server side.
