class Stage {
    static initialize() {
        const stageElement = document.getElementById("stage");
        stageElement.style.width = Config.puyoImgWidth * Config.stageCols + 'px';
        stageElement.style.height = Config.puyoImgHeight * Config.stageRows + 'px';
        stageElement.style.backgroundColor = Config.StageBackgroudColor;
        this.stageElement = stageElement;

        const zenkeshiImage = document.getElementById("zenkeshi");
        zenkeshiImage.width = Config.puyoImgWidth * 6;
        zenkeshiImage.style.position = 'absolute';
        zenkeshiImage.style.display = 'none';
        this.zenkeshiImage = zenkeshiImage;
        stageElement.appendChild(zenkeshiImage);

        const scoreElement = document.getElementById("score");
        scoreElement.style.backgroundColor = Config.scoreBackgroundColor;
        scoreElement.style.top = Config.puyoImgHeight * Config.stageRows + 'px';
        scoreElement.style.width = Config.puyoImgWidth * Config.stageCols + 'px';
        scoreElement.style.height = Config.fontHeight + "px";
        this.scoreElement = scoreElement;

        this.board = [
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
        ];
        let puyoCount = 0;
        for (let y = 0; y < Config.stageRows; y++) {
            const line = this.board[y] || (this.board[y] = []);
            for (let x = 0; x < Config.stageCols; x++) {
                const puyo = line[x];
                if (puyo >= 1 && puyo <= 5) {
                    this.setPuyo(x, y, puyo);
                    puyoCount++;
                } else {
                    line[x] = null;
                }
            }
        }
        this.puyoCount = puyoCount;
    }

    static setPuyo(x, y, puyo) {
        const puyoImage = PuyoImage.getPuyo(puyo);
        puyoImage.style.left = x * Config.puyoImgWidth + "px";
        puyoImage.style.top = y * Config.puyoImgHeight + "px";
        this.stageElement.appendChild(puyoImage);
        this.board[y][x] = {
            puyo: puyo,
            element: puyoImage
        };
    }

    static checkFall() {
        this.fallingPuyoList.length = 0;
        let isFalling = false;

        for (let y = Config.stageRows - 2; y >= 0; y--) {
            const line = this.board[y];
            for (let x = 0; x < line.length; x++) {
                if (!this.board[y][x]) {
                    continue;
                }
                if (!this.board[y + 1][x]) {
                    let cell = this.board[y][x];
                    this.board[y][x] = null;
                    let dst = y;
                    while (dst + 1 < Config.stageRows && this.board[dst + 1][x] == null) {
                        dst++;
                    }
                    this.board[dst][x] = cell;
                    this.fallingPuyoList.push({
                        element: cell.element,
                        position: y * Config.puyoImgHeight,
                        destination: dst * Config.puyoImgHeight,
                        falling: true
                    });
                    isFalling = true;
                }
            }
        }
        return isFalling;
    }
    static fall() {
        let isFalling = false;
        for (const fallingPuyo of this.fallingPuyoList) {
            if (!fallingPuyo.falling) {
                continue;
            }
            let position = fallingPuyo.position;
            position += Config.freeFallingSpeed;
            if (position >= fallingPuyo.destination) {
                position = fallingPuyo.destination;
                fallingPuyo.falling = false;
            } else {
                isFalling = true;
            }
            fallingPuyo.position = position;
            fallingPuyo.element.style.top = position + 'px';
        }
        return isFalling;
    }

    static checkErase(startFrame) {
        this.eraseStartFrame = startFrame;
        this.erasingPuyoInfoList.length = 0;

        const erasedPuyoColor = {};

        const sequencePuyoInfoList = [];
        const existingPuyoInfoList = [];
        const checkSequentialPuyo = (x, y) => {
            const orig = this.board[y][x];
            if (!orig) {
                return;
            }
            const puyo = this.board[y][x].puyo;
            sequencePuyoInfoList.push({
                x: x,
                y: y,
                cell: this.board[y][x],
            });
            this.board[y][x] = null;

            const direction = [
                [0, 1],
                [1, 0],
                [0, -1],
                [-1, 0],
            ];
            for (let i = 0; i < direction.length; i++) {
                const dx = x + direction[i][0];
                const dy = y + direction[i][1];
                if (dx < 0 || dy < 0 || dx >= Config.stageCols || dy >= Config.stageRows) {
                    continue;
                }
                const cell = this.board[dy][dx];
                if (!cell || cell.puyo !== puyo) {
                    continue;
                }
                checkSequentialPuyo(dx, dy);
            }
        };
        for (let y = 0; y < Config.stageRows; y++) {
            for (let x = 0; x < Config.stageCols; x++) {
                sequencePuyoInfoList.length = 0;
                const puyoColor = this.board[y][x] && this.board[y][x].puyo;
                checkSequentialPuyo(x, y);
                if (
                    sequencePuyoInfoList.length == 0 ||
                    sequencePuyoInfoList.length < Config.erasePuyoCount
                ) {
                    if (sequencePuyoInfoList.length) {
                        existingPuyoInfoList.push(...sequencePuyoInfoList);
                    }
                } else {
                    this.erasingPuyoInfoList.push(...sequencePuyoInfoList);
                    erasedPuyoColor[puyoColor] = true;
                }
            }
        }
        this.puyoCount -= this.erasingPuyoInfoList.length;

        for (const info of existingPuyoInfoList) {
            this.board[info.y][info.x] = info.cell;
        }

        if (this.erasingPuyoInfoList.length) {
            return {
                piece: this.erasingPuyoInfoList.length,
                color: Object.keys(erasedPuyoColor).length
            };
        }
        return null;
    }
    static erasing(frame) {
        const elapsedFrame = frame - this.eraseStartFrame;
        const ratio = elapsedFrame / Config.eraseAnimationDuration;
        if (ratio > 1) {
            for (const info of this.erasingPuyoInfoList) {
                var element = info.cell.element;
                this.stageElement.removeChild(element);
            }
            return false;
        } else if (ratio > 0.75) {
            for (const info of this.erasingPuyoInfoList) {
                var element = info.cell.element;
                element.style.display = 'block';
            }
            return true;
        } else if (ratio > 0.5) {
            for (const info of this.erasingPuyoInfoList) {
                var element = info.cell.element;
                element.style.display = 'none';
            }
            return true;
        } else if (ratio > 0.25) {
            for (const info of this.erasingPuyoInfoList) {
                var element = info.cell.element;
                element.style.display = 'block';
            }
            return true;
        } else {
            for (const info of this.erasingPuyoInfoList) {
                var element = info.cell.element;
                element.style.display = 'none';
            }
            return true;
        }
    }
    static showZenkeshi() {
        this.zenkeshiImage.style.display = 'block';
        this.zenkeshiImage.style.opacity = '1';
        const startTime = Date.now();
        const startTop = Config.puyoImgHeight * Config.stageRows;
        const endTop = Config.puyoImgHeight * Config.stageRows / 3;
        const animation = () => {
            const ratio = Math.min((Date.now() - startTime) / Config.zenkeshiDuration, 1);
            this.zenkeshiImage.style.top = (endTop - startTop) * ratio + startTop + 'px';
            if (ratio !== 1) {
                requestAnimationFrame(animation);
            }
        };
        animation();
    }
    static hideZenkeshi() {
        const startTime = Date.now();
        const animation = () => {
            const ratio = Math.min((Date.now() - startTime) / Config.zenkeshiDuration, 1);
            this.zenkeshiImage.style.opacity = String(1 - ratio);
            if (ratio !== 1) {
                requestAnimationFrame(animation);
            } else {
                this.zenkeshiImage.style.display = 'none';
            }
        };
        animation();
    }
}
Stage.fallingPuyoList = [];
Stage.erasingPuyoInfoList = [];
