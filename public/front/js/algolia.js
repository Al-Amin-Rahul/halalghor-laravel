(function () {
    var client = algoliasearch('33QMQTPXIF', '0c82334785ab61d795a5ede78196f307');
    var products = client.initIndex('products');

    autocomplete('#aa-search-input', { hint: false },
        {
            source: autocomplete.sources.hits(products, { hitsPerPage: 5 }),
            displayKey: 'name',
            templates: {
                suggestion: function(suggestion) {
                    const markup = `
                        <div class="algolia-result">
                            <span>
                                <img src="${suggestion._highlightResult.banner.value}">
                                ${(suggestion._highlightResult.name.value).substring(0, 20)}
                            </span>
                            <span>BDT ${(suggestion.price).toFixed(2)}</span>
                        </div><br/>
                        <div class="algolia-details">
                            <span>${(suggestion._highlightResult.description.value).substring(0, 50)}</span>
                        </div>
                        <hr/>
                    `;

                    return markup;
                },

                empty: function (result) {
                    return 'Sorry, we did not find any result for "' + result.query + '"'
                }
            }
        }
    ).on('autocomplete:selected', function(event, suggestion) {
            window.location.href = "http://localhost/Halal Ghor/public/product-details/" +suggestion.slug;
        })
})();




