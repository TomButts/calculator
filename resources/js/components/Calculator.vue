<template>
    <div class="calculator-box">
        <table class="calculator">
            <tbody>
                <tr>
                    <td colspan="4">
                        <input type="text" name="display" v-model="current" class="display" disabled>
                    </td>
                </tr>
                <tr>
                    <td><input type="button" class="button" value="+/-" @click="sign()"></td>
                    <td><input type="button" class="button" value="." @click="point()"></td>
                    <td><input type="button" class="button" value="M" @click="save()"></td>
                    <td><input type="button" class="button" value="%" @click="percent()"></td>
                </tr>
                <tr>
                    <td><input type="button" @click="append('1')" class="button" value="1"></td>
                    <td><input type="button" @click="append('2')" class="button" value="2"></td>
                    <td><input type="button" @click="append('3')" class="button" value="3"></td>
                    <td><input type="button" class="button" value="+" @click="operator('add')"></td>
                </tr>
                <tr>
                    <td><input type="button" @click="append('4')" class="button" value="4"></td>
                    <td><input type="button" @click="append('5')" class="button" value="5"></td>
                    <td><input type="button" @click="append('6')" class="button" value="6"></td>
                    <td><input type="button" class="button" value="-" @click="operator('minus')"></td>
                </tr>
                <tr>
                    <td><input type="button" @click="append('7')" class="button" value="7"></td>
                    <td><input type="button" @click="append('8')" class="button" value="8"></td>
                    <td><input type="button" @click="append('9')" class="button" value="9"></td>
                    <td><input type="button" class="button" value="/" @click="operator('divide')"></td>
                </tr>
                <tr>
                    <td><button @click="clear()" class="button">C</button></td>
                    <td><input type="button" @click="append('0')" class="button" value="0"></td>
                    <td><input type="button" class="button" value="=" @click="equal('equal')"></td>
                    <td><input type="button" class="button" value="*" @click="operator('multiply')"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                previous: '',
                current: '',
                repeat: false,
                temp: '',
                memory: null,
                operand: null,
                operandSet: false
            }
        },
        methods: {
            save: function () {
                if (!this.memory) {
                    this.memory = this.current
                    this.current = ''
                } else {
                    this.current = this.memory
                    this.memory = ''
                }
            },
            clear: function () {
                this.previous = ''
                this.current = ''
                this.operand = null,
                this.operandSet = false
                this.repeat = false
                this.temp = ''
            },
            append: function (number) {
                if (this.operandSet) {
                    // If operand is set, new number
                    this.current = ''
                    this.operandSet = false
                }

                this.current = `${this.current}${number}`

                // If repeat mode disengaged, grab value to repeat
                if (!this.repeat) {
                    this.temp = this.current
                }
            },
            point: function () {
                if (this.current.indexOf('.') === -1) {
                    this.append('.')
                }
            },         
            equal: function (nextOperand = null) {
                if (!this.operand || (this.current == '' && this.previous == '')) {
                    // Skip when no numbers loaded
                    return
                }

                // Equals pressed
                if (nextOperand == 'equal' && (this.repeat || (this.current && this.previous == '' && this.operand))) {
                    // Repeat last equation
                    this.current = `${this.operand(
                        parseFloat(this.current),
                        parseFloat(this.temp)
                    )}`

                    // Fake operand set, so that append new number if using keypad
                    this.operandSet = true
                } else if (nextOperand == 'equal' && !this.repeat) {
                    // Equals pressed for the first time
                    this.current = `${this.operand(
                        parseFloat(this.previous),
                        parseFloat(this.current)
                    )}`

                    // Engage repeat mode, clear previous
                    this.repeat = true
                    this.previous = ''
                } else if (nextOperand) {
                    // Operation button pressed
                    this.current = `${this.operand(
                        parseFloat(this.previous),
                        parseFloat(this.current)
                    )}`
                    
                    // Clear previous
                    this.previous = ''
                    
                    // Set up next operand
                    this.operandSet = false
                    this.operator(nextOperand)
                }                
            },
            sign: function () {
                // If minus, slice to remove minus, else prepend minus
                this.current = this.current.charAt(0) === '-' ?
                    this.current.slice(1) : `-${this.current}`
            },
            percent: function () {
                this.current = `${parseFloat(this.current) / 100}`
            },
            operator: function (operand) {
                if (this.current && this.previous && !this.operandSet) {
                    this.equal(operand)
                    return
                }

                switch (operand) {
                    case 'add':
                        this.operand = (previous, current) => previous + current
                        break;
                    case 'minus':
                        this.operand = (previous, current) => previous - current
                        break;
                    case 'divide':
                        this.operand = (previous, current) => {
                            if (previous == 0 || current == 0) {
                                return 0
                            }

                            return previous / current
                        }
                        break;
                    case 'multiply':
                        this.operand = (previous, current) => previous * current
                        break;
                
                    default:
                        break;
                }

                this.operandActive()
            },
            operandActive: function () {
                // Set flag
                this.operandSet = true

                // Move current number to previous variable
                this.previous = this.current

                // If an operand is pressed de-activate repeat
                this.repeat = false
            },
        }
    }
</script>
