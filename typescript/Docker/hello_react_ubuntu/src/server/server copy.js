const express = require('express')
const app = express()
const port = 3001
const merchant_model = require('./merchant_model')
app.use(express.json())
app.use(function (req, res, next) {
  res.setHeader('Access-Control-Allow-Origin', 'http://localhost:3000');
  res.setHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers');
  next();
});
import path from 'path';


app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join('./', 'dist')));


app.get('/', (req, res) => {
    merchant_model.getMerchants()
    .then(response => {
      res.status(200).send(response);
    })
    .catch(error => {
      res.status(500).send(error);
    })
  })

  app.post('/merchants', (req, res) => {
    merchant_model.createMerchant(req.body)
    .then(response => {
      res.status(200).send(response);
    })
    .catch(error => {
      res.status(500).send(error);
    })
  })

  app.delete('/merchants/:id', (req, res) => {
    merchant_model.deleteMerchant(req.params.id)
    .then(response => {
      res.status(200).send(response);
    })
    .catch(error => {
      res.status(500).send(error);
    })
  })

  app.listen(port, () => {
    console.log(`App running on port ${port}.`)
  })


app.get('/api', (req, res) => {
    res.send({api: 'est'});
})

app.get('*', function (req, res) {
    res.sendFile(path.join('./', 'dist', 'index.html'))
  })

app.post('/api', function (req, res) {
    const now = new Date();
    const hour = now.getHours();
    if (hour >= 5 && hour <= 10) {
        res.json({
            msg: 'おはよう',
        data: req.body
        })
    }
    else if (hour >= 11 && hour <= 18) {
        //console.log(req.body.input_name);
        res.json({
            msg: 'こんにちは',
        data: req.body.input_name
        })
    }
    else if(hour >= 19 && hour <= 23) {
        res.json({
            msg: 'こんにちは',
        data: req.body
        })
    }
    else if (hour >= 24 && hour <= 5) {
        res.json({
            msg: 'こんばんは',
        data: req.body
        })
    }
    else {
        res.json({
            msg: 'Hello',
        data: req.body
  })
        //res. json('何も食べてはいけません。' + req.body + 'さん');
        console.log('おーい');
        console.log(`req.body: ${JSON.stringify(req.body)}`)
    }
});

app.listen(3000, ()=> {
    console.log('server running');
})
