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
                    <td><input type="button" class="button" value="+" @click="add()"></td>
                </tr>
                <tr>
                    <td><input type="button" @click="append('4')" class="button" value="4"></td>
                    <td><input type="button" @click="append('5')" class="button" value="5"></td>
                    <td><input type="button" @click="append('6')" class="button" value="6"></td>
                    <td><input type="button" class="button" value="-" @click="minus()"></td>
                </tr>
                <tr>
                    <td><input type="button" @click="append('7')" class="button" value="7"></td>
                    <td><input type="button" @click="append('8')" class="button" value="8"></td>
                    <td><input type="button" @click="append('9')" class="button" value="9"></td>
                    <td><input type="button" class="button" value="/" @click="divide()"></td>
                </tr>
                <tr>
                    <td><button @click="clear()" class="button">C</button></td>
                    <td><input type="button" @click="append('0')" class="button" value="0"></td>
                    <td><input type="button" class="button" value="=" @click="equal()"></td>
                    <td><input type="button" class="button" value="*" @click="mulitply()"></td>
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
            },
            append: function (number) {
                if (this.operandSet) {
                    this.current = ''
                    this.operandSet = false
                }

                this.current = `${this.current}${number}`
            },
            point: function () {
                if (this.current.indexOf('.') === -1) {
                    this.append('.')
                }
            },         
            equal: function () {
                this.current = `${this.operand(
                    parseFloat(this.previous),
                    parseFloat(this.current)
                )}`
                
                this.previous = ''
            },
            sign: function () {
                // If minus, slice to remove minus, else prepend minus
                this.current = this.current.charAt(0) === '-' ?
                    this.current.slice(1) : `-${this.current}`
            },
            percent: function () {
                this.current = `${parseFloat(this.current) / 100}`
            },
            add: function () {
                this.operand = (previous, current) => previous + current
                this.operandActive()
            },
            minus: function () {
                this.operand = (previous, current) => previous - current
                this.operandActive()
            },
            multiply: function () {
                this.operand = (previous, current) => previous * current
                this.operandActive()
            },
            divide: function () {
                this.operand = (previous, current) => previous / current
                this.operandActive()
            },
            operandActive: function () {
                // Set flag
                this.operandSet = true

                // Move current number to previous variable
                this.previous = this.current
            },
        }
    }
</script>
