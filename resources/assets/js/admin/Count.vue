<template>
    <div>
        <tab>
            <tab-item selected @on-item-click="onClick">报到</tab-item>
            <tab-item @on-item-click="onClick">未报到</tab-item>
        </tab>

        <div style="padding:15px;">
            <x-table full-bordered style="background-color:#fff;">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>班级</th>
                    <th>性别</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Apple</td>
                    <td>$1.25 x 10</td>
                    <td>$1.25 x 10</td>
                </tr>
                <tr>
                    <td>Banana</td>
                    <td>$1.20</td>
                    <td>x 08</td>
                </tr>
                </tbody>
            </x-table>
        </div>
    </div>
</template>

<script>
    import { Tab, TabItem, XTable } from 'vux'

    export default {
        components: {
            Tab, TabItem, XTable
        },
        data () {
            return {

            }
        },
        methods: {
            onClick(){

            }
        }
    }
</script>