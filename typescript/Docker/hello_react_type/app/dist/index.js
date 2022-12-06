"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
//expressの関数から持ってくる
const express_1 = __importDefault(require("express"));
const path = require("path");
//import merchant_model = require('./merchant_model');
const merchant_model = require('./merchant_model');
const app = express_1.default();
const port = 8882;
//クライアントからの受け取り処理
app.use(express_1.default.json());
app.use(express_1.default.urlencoded({ extended: true }));
app.use(express_1.default.static(path.join('./', 'public')));
app.get('/', (req, res) => {
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
app.post('/api/db', (req, res) => {
    merchant_model
        .loginMerchants(req.body)
        .then((response) => {
        // console.log(response);
        res.status(200).send(response);
    })
        .catch((error) => {
        res.status(500).send(error);
    });
});
app.get('/api', (req, res) => {
    res.send({ api: 'gest' });
});
app.post('/api', (req, res) => {
    const now = new Date();
    const hour = now.getHours();
    if (hour >= 5 && hour <= 10) {
        res.json({
            msg: 'おはよう',
            data: req.body,
        });
    }
    else if (hour >= 11 && hour <= 18) {
        //console.log(req.body.input_name);
        res.json({
            msg: 'こんにちは',
            data: req.body.input_name,
        });
    }
    else if (hour >= 19 && hour <= 23) {
        res.json({
            msg: 'こんばんは',
            data: req.body,
        });
    }
    else if (hour >= 24 && hour <= 5) {
        res.json({
            msg: 'こんばんは',
            data: req.body,
        });
    }
    else {
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
//# sourceMappingURL=index.js.map