<script>
  function tableRowHandler() {
    const sheets = {!! json_encode($sheets) !!};
    return {
        itemId: '',
        items: sheets.data,
        state: 'CLOSED',
        formatDateToMonthYear(date) {
          return helperDateToMonthYear(date);
        },
        statusColor(status) {
          if(status === 'ONGOING') {
            return 'bg-yellow-200'
          } else if(status === 'PENDING') {
            return 'bg-red-200';
          } else {
            return 'bg-green-200';
          }
        },
        addModal:modalState(),
        deleteModal:modalState(),
        duplicateModal:modalState(),
    }
  }

  function modalState() {
    return {
      itemId: '',
      state: 'CLOSED',
        open(id) {
          this.itemId = id;
          this.state = 'TRANSITION';
          setTimeout(() => { this.state = 'OPEN' }, 50)
        },

        close() {
          this.state = 'TRANSITION'
          setTimeout(() => { this.state = 'CLOSED' }, 300)
        },

        isOpen() {
          return this.state === 'OPEN'
        },

        get isOpening() {
          return this.state !== 'CLOSED'
        },
    }
  }
</script>