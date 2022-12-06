//カリー化関数
const TRUE = x => y => x;
const FALSE = x => y => y;

const bisplay = f => f("T")("F");

console.log(bisplay(TRUE));
console.log(bisplay(FALSE));

const NOT = p => p(FALSE)(TRUE);

const AND = p => q => p(q)(FALSE);

const OR = p => q => p(TRUE)(q);

const IFELSE = p => x => y => p(x)(y);

const try2 = [TRUE, FALSE].map(p => bisplay(NOT(p)));

console.log(try2);

const truth = [
    [TRUE, TRUE],
    [TRUE, FALSE],
    [FALSE, TRUE],
    [FALSE, FALSE]
];
truth.map(([p, q]) => bisplay(AND(p)(q)));
truth.map(([p, q]) => bisplay(OR(p)(q)));

[TRUE, FALSE].map(p => IFELSE(p)("koko")("doko"));

const ZERO = f => x => x;
const SUCC = n => f => x => f(n(f)(x));

const display = f => f(n => n + 1)(0);

display(ZERO);
display(SUCC(ZERO));
display(SUCC(SUCC(ZERO)));
display(SUCC(SUCC(SUCC(ZERO))));

const ISZERO = n => n(x => FALSE)(TRUE);

const PRED = n => f => x => n(g => h => h(g(f)))(u => x)(u => u);

console.log(PRED);

const range = [ZERO, SUCC(ZERO), SUCC(SUCC(ZERO)), SUCC(SUCC(SUCC(ZERO)))];
range.map(ISZERO).map(bisplay);
range.map(PRED).map(display);

const PLUS = m => n => f => x => m(f)(n(f)(x));

const MULT = m => n => f => m(n(f));

const three = SUCC(SUCC(SUCC(ZERO)));
const five = SUCC(SUCC(three));

display(PLUS(three)(five));
display(PLUS(ZERO)(three));
display(MULT(three)(five));
display(MULT(ZERO)(five));

const Z = f => (x => f(y => x(x)(y)))(x => f(y => x(x)(y)));

const facto = Z(f => i =>
    ISZERO(i)(() => SUCC(ZERO))(() => MULT(i)(f(PRED(i))))()
);

display(facto(SUCC(SUCC(SUCC(SUCC(ZERO))))));

const PAIR = x => y => f => f(x)(y);
const FIRST = p => p(TRUE);
const SECOND = p => p(FALSE);

const pisplay = p => p(x => y => [x, y]);
const pair = PAIR("first")("second");

pisplay(pair);
FIRST(pair);
SECOND(pair);

const CONS = PAIR;
const HEAD = FIRST;
const TAIL = SECOND;
const NIL = FALSE;
const ISNIL = l => l(h => t => d => FALSE)(TRUE);

bisplay(ISNIL(NIL));

const empty = NIL;
const added = CONS("a")(empty);
const moreAdded = CONS("b")(added);
const [b, x] = [HEAD(moreAdded), TAIL(moreAdded)];
b;
const [a, y] = [HEAD(x), TAIL(x)];
a;

bisplay(ISNIL(y));
