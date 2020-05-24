var result = 0;//输出的结果
function show() {
    // result = parseFloat(result);
    if (result.length>=15||result>99999999999999)
        alert("数值超过显示范围，无法显示！");
    else
        document.getElementById("result").innerHTML = result;
}
function AC() {
    document.getElementById("AC").innerHTML = "AC";
}
function C() {
    document.getElementById("AC").innerHTML = "C";
}
var tempNum = 0;
var equation = "";//运算式
function num(value) {//选择数字时处理函数
    if (equation == "0")
        equation = "";
    if (result == "0") {
        if (value == ".")
            result = result + value;
        else
            result = value;
    } 
    else {
        result = result + value;
    }
    equation = equation + value;
    tempNum = result;
    show();
    C();
}

var divideFlag = 0;//除号标记
var mathFlag = 0;//运算符标记

function select(operator) {//选择符号时处理函数
    switch (operator) {
        case "AC":
            result = 0;
            tempNum = 0;
            equation = "";
            divideFlag = 0;
            show();
            AC();
            break;
        case "+/-":
            result *= (-1);
            tempNum = result;
            equation = result;
            show();
            break;
        case "%":
            result/=100;
            tempNum = result;
            equation = result;
            show();
            break;
        case "+":
        case "-":
        case "*":
        case "/":
            mathFlag = 1;
            equation = equation + operator;//将result与运算符存入
            result = 0;//清楚暂存的result
            if (operator == "/")
                divideFlag = 1;
            break;
        case "=":
            if (divideFlag == 1 && tempNum == 0)
            {
                window.alert("除数不能为0！");
                equation = "";
                result = 0;
                show();
                break;
            }
            if(mathFlag == 1 && result == 0)
            {
                equation = equation + tempNum;
            }
            divideFlag = 0;
            mathFlag = 0;
            result = eval(equation);//eval函数计算
            show();
            equation = result;
            tempNum = result;
            break;
    }
}