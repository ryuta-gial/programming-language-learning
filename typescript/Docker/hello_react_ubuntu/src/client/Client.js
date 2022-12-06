import React, { useState } from "react";
import axios from "axios";
import './App.css';

export default function Client(){
    const [name, setName] = useState("");
    const [resdata, setresData] = useState("");
    const [showLoading, setShowLoading] = useState(true);
    const apiUrl = "http://localhost:8000/api/";
    const saveProduct = (e) => {
        console.log(name);
        if (name.length <= 0) {
            alert("名前を入力してください");
            return false;
        }
        e.preventDefault();
        const data = { input_name: name };
        //非同期処理
        axios.post(apiUrl, data)
            .then(function (response) {
                //console.log(response.data);
                const rep = response.data;
                //alert(rep.msg);
                setShowLoading(false);
                setresData(rep.msg);
            })
            .catch(function (error) {
                console.log(error);
            });
    };
    //コンポーネント定義
    const CComponent = () =>{
        //console.log(resdata);
        return <div className="shimmer" >{resdata}　{name} </div>;
    };
    const handleChange = (event) => {
        switch (event.target.name) {
            case 'name':
                setName(event.target.value);
                break;
            default:
                console.log('key not found');
        }
    };
    if (showLoading) {
        return (
            <form onSubmit={saveProduct}>
                <h1>名前を入力してください</h1>
                <input type="text" id="prod_name" placeholder="清水龍太" name="name" value={name} onChange={handleChange} />
                <button disabled={name.length<1} type="submit">Submit</button>
            </form>
        );
    }
    return (
        <div>
            <CComponent/>
        </div>
    );
}