function stockCheck() {
    return {
        formData: {
            symbol: ''
        },
        high: '',
        low: '',
        price: '',
        symbol: '',
        submitButton: 'Check',
        hasResult: false,
        error: false,
        fetch() {
            this.submitButton = 'Loading...';
            this.hasResult= false;
            this.error = false;
            fetch(`/api/check-stock/${this.formData.symbol}`)
                .then(response => {
                    if (response.ok) {
                        return response.json()
                    } else if(response.status === 404) {
                        this.error = true;
                        this.symbol = this.formData.symbol;
                    } else {
                        return Promise.reject('some other error: ' + response.status)
                    }
                })
                .then(data => {
                    console.log(data);
                    this.high = data.high;
                    this.low = data.low;
                    this.price = data.price;
                    this.symbol = data.symbol;
                    this.submitButton = 'Check';
                    this.hasResult= true;
                    this.error = false;
                });
        }
    }
}
