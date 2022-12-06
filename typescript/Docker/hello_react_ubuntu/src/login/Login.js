import React, { useState, useReducer, useEffect, useRef } from 'react';
import {
    BrowserRouter as Router,
    Switch,
    Route
} from "react-router-dom"
import { verifyLogin } from '../api/Auth';
import axios from "axios";
import './Login.css';
import Client from '../client/Client';
import "core-js/stable";
import "regenerator-runtime/runtime";

import ReactDOM from "react-dom"

//初期値
const initialState = {
    userid: '',
    password: '',
    isLoading: false,
    isLoggedIn: false,
    error: ''
};
//状態
function loginReducer(state, action) {
    switch (action.type) {
        case 'field': {
            return {
            ...state,
            [action.fieldName]: action.payload
        };
    }
    case 'login': {
        return {
            ...state,
            error: '',
            isLoading: true,
            isFocused: true
        };
    }
    case 'success': {
        return {
            ...state,
            isLoggedIn: true,
            isLoading: false
        };
    }
    case 'error': {
        return {
            ...state,
            error: 'Incorrect userid or password entered',
            isLoggedIn: false,
            isLoading: false,
            userid: '',
            password: '',
            isFocused: true
        };
    }
    case 'logout': {
        return {
            ...state,
            isLoggedIn: false,
            userid: '',
            password: '',
            error: ''
        };
    }
    default:
        return state;
    }
}
//メイン
export default function Login() {
    //「useReducer」とは、2つの値を取り、1つの値を返す関数
    const [state, dispatch] = useReducer(loginReducer, initialState);
    const { userid, password, isLoading, isLoggedIn, error, isFocused } = state;
    const [resdata, setresData] = useState("");
    //useRefは.current プロパティが渡された引数 (initialValue) に初期化されているミュータブルな ref オブジェクトを返します。
    const useridRef = useRef(null);
    const apiUrl = "http://localhost:8882/api/db/";
    //ローカルのみ
    //const apiUrl = "http://localhost:8000/api/db/";
    const handleSubmit = (e) => {
        e.preventDefault();
        dispatch({ type: verifyLogin });
        const data = {
            user_id: userid,
            user_pass: password
        };
        axios.post(apiUrl, data)
            .then(function (response) {
                alert("ログイン成功です!!");
                //console.log(response.data);
                //const rep = response.data;
                // const json = JSON.stringify(rep,["idname"]);
                // alert(json);
                dispatch({ type: 'success' });
            })
            .catch(function (error) {
                console.log(error);
                dispatch({ type: 'error' });
            });
    };
    //学習用
    // const handleSubmit = async e => {
    //     e.preventDefault();
    //     dispatch({ type: verifyLogin });
    //     try {
    //         alert("ここ");
    //         await verifyLogin({ userid, password });
    //         dispatch({ type: 'success' });
    //     } catch (error) {
    //         dispatch({ type: 'error' });
    //     }
    // };
    useEffect(() => {
        if (isFocused) {
          //読み込み時にinputにフォーカスさせる
            useridRef.current.focus();
        }
    }, [isFocused]);
        return (
            <div className="App">
                <div className="login-container">
                    {isLoggedIn ? (
                    <Router>
                            <Switch>
                            <Route path='/' render={ () => <Client/> }/>
                        </Switch>
                        </Router>
                    ) : (
                            <form className="form" onSubmit={handleSubmit}>
                                {error && <p className="error">{error} </p>}
                                <p>Please Login!</p>
                                <input type="text" id="prod_name" ref={useridRef} placeholder="Enter userid" autoFocus name="id" value={userid} onChange={e => dispatch({
                                    type: 'field',
                                    fieldName: 'userid',
                                    payload: e.currentTarget.value
                                })} />
                                <input type="password" id="prod_name" placeholder="Enter password" name="pass" value={password} onChange={e =>
                                    dispatch({
                                    type: 'field',
                                    fieldName: 'password',
                                    payload: e.currentTarget.value
                                })} />
                                <button className="submit" type="submit" disabled={isLoading}>
                                    {isLoading ? 'Logging In.....' : 'Log In'}
                                </button>
                            </form>
                        )}
                </div>
            </div>
        )
}
const rootElement = document.getElementById("index");
ReactDOM.render(<Login />, rootElement)