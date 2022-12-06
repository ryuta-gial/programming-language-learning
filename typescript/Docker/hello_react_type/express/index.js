const express = require('express')
const app = express();
const port = 8882;
const merchant_model = require('./merchant_model')

app.use(express.json())
app.use(express.urlencoded({ extended: true }))

// import path from 'path';
 //app.use(express.static(path.join('./', 'dist')));
 app.use(function (req, res, next) {
     res.setHeader('Access-Control-Allow-Origin', 'http://localhost:8000');
     res.setHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
     res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers');
     next();
 });
app.get('/', (req, res) => res.send('Hello World!'))
app.get('/api/dbl', (req, res) => res.send('World!'))
app.get('/api/db', (req, res) => {
    merchant_model.getMerchants()
    .then(response => {
        res.status(200).send(response);
    })
    .catch(error => {
        res.status(500).send(error);
    })
})
app.post('/api/db', (req, res) => {
    console.log("ここにきてるぞ");
    merchant_model.loginMerchants(req.body)
        .then(response => {
            // console.log(response);
    res.status(200).send(response);
    })
    .catch(error => {
        res.status(500).send(error);
    })
})

app.listen(port, ()=> {
    console.log('server running');
})
