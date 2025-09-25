<script>
    function tableRowHandler() {
        const sheetFields = {!! $sheet !!};
        const itemFields = {!! $items !!};
        const lsPerWeek = sheetFields.ls_per_week;
        const scPerWeek = sheetFields.sc_per_week;
        const user = {!! $user !!};
        return {
            sheetFields,
            itemFields,
            lsPerWeek,
            scPerWeek,
            user,
            calculation: calculator({itemFields, lsPerWeek, scPerWeek, sheetFields}),
            formatDateToMonthYear(date) {
                return helperDateToMonthYear(date);
            },
            lsItemShouldChecked(item, index) {
                return !(typeof item[index] === 'undefined' || item[index] === 'off');
            },
        }
    }

    function calculator(datas) {
        return {
            totalRent() {
                const { recValues } = getRentDatas(datas);
                const rec = recValues.reduce((a, b) => a + b, 0);
                return this.moneyRound(rec);
            },
            totalCost() {
                return this.moneyRound(getCostDatas(datas).reduce((a, b) => a + b, 0))
            },
            totalInspection() {
                let total = 0;
                getInspectionDatas(datas).forEach(data => {
                    total = total + data.reduce((a, b) => !isNaN(a) && !isNaN(b) ? a + b : a, 0);
                });
                return total;
            },
            lsPerWeekTotal() {
                // NOTE: Client says that LS (landscaping) should be per month
                // on the add progress sheet modal. The calculation will be obsolete
                // so I will just comment it out. Incase he changes his mind.

                // const { sheetFields, lsPerWeek } = datas;
                // let lsAmountPerWeek = parseFloat(sheetFields.ls_amount_per_week);
                // let multiplier = 0;
                // let formatedLscpw = [];

                // if(!_.isArray(lsPerWeek)) {
                //     _.forOwn(lsPerWeek, function(value, key) {
                //         formatedLscpw.push((value || value === 'on'));
                //     });
                // } else {
                //     formatedLscpw = lsPerWeek;
                // }

                // formatedLscpw.forEach(lspw => {
                //     if(typeof lspw === 'string' || typeof lspw === 'boolean') {
                //         multiplier = multiplier + ((lspw || lspw === 'on') ? 1 : 0);
                //     }
                // });
                // return this.moneyRound(lsAmountPerWeek * multiplier);

                const lsAmountPerWeek = parseFloat(datas.sheetFields.ls_amount_per_week);
                return this.moneyRound(lsAmountPerWeek);
            },
            scPerWeekTotal() {
                let { sheetFields, scPerWeek } = datas;
                let scAmountPerWeek = parseFloat(sheetFields.sc_amount_per_week);
                let multiplier = 0;
                let formatedScpw = [];

                if(!_.isArray(scPerWeek)) {
                    _.forOwn(scPerWeek, function(value, key) {
                        formatedScpw.push((value || value === 'on'));
                    });
                } else {
                    formatedScpw = scPerWeek;
                }

                formatedScpw.forEach(scpw => {
                    if(typeof scpw === 'string' || typeof scpw === 'boolean') {
                        multiplier = multiplier + ((scpw || scpw === 'on') ? 1 : 0);
                    }
                });
                return this.moneyRound(scAmountPerWeek * multiplier);
            },
            grandTotal() {
                const total = this.totalRent() -
                this.totalCost() -
                this.totalInspection() -
                this.lsPerWeekTotal() -
                this.scPerWeekTotal()
                return this.moneyRound(total);
            },
            moneyRound(num) {
                return Math.ceil(num * 100) / 100;
            },
        }
    }

    function getRentDatas(datas) {
        const recValues = [];
        const delqValues = [];

        datas.itemFields.forEach(val => {
            const rents = val.rents;
            const a = parseFloat(rents.rec);
            if(!isNaN(a)) {
                recValues.push(a);
            }
            const b = parseFloat(rents.delq);
            if(!isNaN(b)) {
                delqValues.push(b);
            }
        });
        return {recValues, delqValues};
    }

    function getCostDatas(datas) {
        const costValues = [];
        datas.itemFields.forEach(val => {
            const a = parseFloat(val.cost);
            if(!isNaN(a)) {
                costValues.push(a);
            }
        })
        return costValues;
    }

    function getInspectionDatas(datas) {
        let result = [];
        datas.itemFields.forEach(field => {
            let i = field.inspection;

            if(typeof i === 'string') {
                i = field.inspection;
                if(typeof i !== 'object') {
                    return 'UNSET';
                }
            }

            const sd     = ('sd' in i) ? parseFloat(i.sd) : 0;
            const lcks   = ('lcks' in i) ? parseFloat(i.lcks) : 0;
            const leks   = ('leks' in i) ? parseFloat(i.leks) : 0;
            const seal   = ('seal' in i) ? parseFloat(i.seal) : 0;
            const extern = ('extern' in i) ? parseFloat(i.extern) : 0;

            result.push([sd, lcks, leks, seal, extern]);
        });
        return result;
    }
</script>
