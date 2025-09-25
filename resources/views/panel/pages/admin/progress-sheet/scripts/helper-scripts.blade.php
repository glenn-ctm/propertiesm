<script>
    function helperDateToMonthYear(date) {
        const nDate = new Date(date);
        return ('0' + (nDate.getMonth() + 1)).slice(-2) + '/' + nDate.getFullYear();
    }
    function helperFromDbDateToMonthYear(rawDate) {
        if(rawDate !== null) {
            const d = new Date(rawDate);
            const date = ('0' + d.getDate()).slice(-2);
            const month = d.getMonth() + 1
            const year = d.getFullYear();

            return month + "/" + date + "/" + year;
        }
    }
</script>
