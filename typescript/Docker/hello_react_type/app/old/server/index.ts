//expressの関数から持ってくる
import express from 'express';
import { Request, Response } from 'express';
import path = require('path');
import merchant_model = require('./merchant_model');
const app = express();
const port = 8882;

//クライアントからの受け取り処理
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join('./', 'public')));

app.get('/', (req: Request, res: Response) => {
    res.redirect('/login');
});

// app.get('/api/db', (req, res) => {
//     merchant_model.getMerchants()
//     .then(response => {
//         res.status(200).send(response);
//     })
//     .catch(error => {
//         res.status(500).send(error);
//     })
// })

app.post('/api/db', (req: Request, res: Response) => {
    merchant_model
        .loginMerchants(req.body)
        .then((response: string) => {
            // console.log(response);
            res.status(200).send(response);
        })
        .catch((error: string) => {
            res.status(500).send(error);
        });
});

app.get('/api', (req: Request, res: Response) => {
    res.send({ api: 'gest' });
});

app.post('/api', (req: Request, res: Response) => {
    const now = new Date();
    const hour = now.getHours();
    if (hour >= 5 && hour <= 10) {
        res.json({
            msg: 'おはよう',
            data: req.body,
        });
    } else if (hour >= 11 && hour <= 18) {
        //console.log(req.body.input_name);
        res.json({
            msg: 'こんにちは',
            data: req.body.input_name,
        });
    } else if (hour >= 19 && hour <= 23) {
        res.json({
            msg: 'こんばんは',
            data: req.body,
        });
    } else if (hour >= 24 && hour <= 5) {
        res.json({
            msg: 'こんばんは',
            data: req.body,
        });
    } else {
        res.json({
            msg: 'Hello',
            data: req.body,
        });
        //console.log('おーい');
        //console.log(`req.body: ${JSON.stringify(req.body)}`)
    }
});

app.listen(port, () => {
    console.log('server running');
});
