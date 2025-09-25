<script>
    function tableRowHandler() {
        const nSheetFields = {!! json_encode($nProgSheet) !!}
        const itemFields  = {!! json_encode(old('items', $items)) !!};
        const sheetFields = {!! json_encode(old('items', $sheet)) !!}
        const lsPerWeek = {!! json_encode(old('lsPerWeek', [false, false, false, false])) !!};
        const scPerWeek = {!! json_encode(old('scPerWeek', [false, false, false, false])) !!};
        return {
            itemFields,
            lsPerWeek,
            scPerWeek,
            calculation: calculator({itemFields, sheetFields, lsPerWeek, scPerWeek, nSheetFields}),
            addNewField() {
                this.itemFields.push({
                    unit: '',
                    rents:  {
                        rec: '',
                        delq: '',
                    },
                    repairs: '',
                    tl: '',
                    subc: '',
                    cost: '',
                    inspection: {
                        lcks: '',
                        leks: '',
                        seal: '',
                        sd: '',
                    },
                    extern: '',
                    new_occupant: '',
                    eviction: ''
                ,
                });
            },
            removeField(index) {
                this.itemFields.splice(index, 1);
            }
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

                // const { sheetFields, lsPerWeek, nSheetFields } = datas;
                // let lsAmountPerWeek = parseFloat(nSheetFields.landScaping);
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

                let lsAmountPerWeek = parseFloat(datas.nSheetFields.landScaping);
                return this.moneyRound(lsAmountPerWeek);
            },
            scPerWeekTotal() {
                let { sheetFields, scPerWeek, nSheetFields } = datas;
                let scAmountPerWeek = parseFloat(nSheetFields.siteCheck);
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
            if(val.rents.rec !== '') {
                const a = parseFloat(val.rents.rec);
                if(!isNaN(a)) {
                    recValues.push(a);
                }
            }
            if(val.rents.delq !== '') {
                const a = parseFloat(val.rents.delq);
                if(!isNaN(a)) {
                    delqValues.push(a);
                }
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
                i = JSON.parse(field.inspection);
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