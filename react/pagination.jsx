import React, { useState, useEffect } from 'react';
const USERS_URL = 'https://example.com/api/users';

export default function Table() {
  const [data, setData] = useState({ array: [] });
  const [pageNum, setPageNum] = useState(0);
  const [lastPageNum, setLastPageNum] = useState(0);
  const [disable, setDisable] = useState(false);

  //tabelのセルの内容を表示
  function renderCell(getData) {
    if (getData.results !== undefined) {
      const showCellData = getData.results.map((value) => {
        return (
          <tr>
            <th>{value.id}</th>
            <td>{value.firstName}</td>
            <td>{value.lastName}</td>
          </tr>
        );
      });
      return showCellData;
    }
  }

  //表示されているページが最終ページか判定
  function checkLastPage() {
    if (pageNum !== lastPageNum) {
      return false;
    } else {
      return true;
    }
  }

  //次のページがあるかを判定
  function checkNextPage() {
    if (pageNum === lastPageNum) {
      return true;
    }
  }

  //前にページがあるかを判定
  function checkFirstPage() {
    if (pageNum === 0) {
      return true;
    }
  }

  useEffect(() => {
    fetch(USERS_URL + '?page=' + pageNum, { method: 'GET' })
      .then((res) => res.json())
      .then((data) => {
        //APIから取得したデータ
        setData(data);
        //取得したデータのページ数を格納
        setLastPageNum(Math.trunc(data.count / 10));
        //データの取得が完了したらボタンを表示
        setDisable(false);
      });
  }, [pageNum]);

  return (
    <div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
          </tr>
        </thead>
        <tbody>{renderCell(data)}</tbody>
      </table>
      <section className='pagination'>
        <button
          className='first-page-btn'
          onClick={() => {
            //最初のページか判定
            if (pageNum !== 0) {
              setPageNum(0);
              setDisable(true);
            }
          }}
          disabled={disable || checkFirstPage()}
        >
          first
        </button>
        <button
          className='previous-page-btn'
          onClick={() => {
            //前にページが存在するか判定
            if (0 < pageNum) {
              setPageNum(pageNum - 1);
              setDisable(true);
            }
          }}
          disabled={disable}
        >
          previous
        </button>
        <button
          className='next-page-btn'
          onClick={() => {
            //後ろにページが存在するか判定
            if (lastPageNum > pageNum) {
              setPageNum(pageNum + 1);
              setDisable(true);
            }
          }}
          disabled={disable || checkNextPage()}
        >
          next
        </button>
        <button
          className='last-page-btn'
          onClick={() => {
            //現ページが最後のページでないか判定
            if (!checkLastPage()) {
              setPageNum(lastPageNum);
              setDisable(true);
            }
          }}
          disabled={disable || checkLastPage()}
        >
          last
        </button>
      </section>
    </div>
  );
}
