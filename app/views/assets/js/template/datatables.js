class DataTable{

    element;
    headers;
    items;
    copyItems;
    selected;
    pagination;
    numberOfEntries;
    headerButtons;
    table;

    constructor(selector,table, headerButtons){
        this.element = document.querySelector(selector);

        this.headers = [];
        this.items = [];
        this.pagination = {
            total: 0, 
            noItemsPerPage: 0, 
            noPages: 0, 
            actual: 0, 
            pointer: 0, 
            diff: 0,
            lastPageBeforeDots: 0,
            noButtonsBeforeDots: 4 
        };

        this.selected = [];
        this.numberOfEntries = 5;
        this.headerButtons = headerButtons;
        this.table = table;
    }

    parse(){
        
        const headers = [...this.element.querySelector('thead tr').children];
        const trs = [...this.element.querySelector('tbody').children];
        
        headers.forEach(element =>{
            this.headers.push(element.textContent);
        });

        trs.forEach(tr =>{
            const cells = [...tr.children];

            const item = {
                id: this.generateUUID(),
                values: []
            };

            cells.forEach(cell =>{
                
                if(cell.children.length > 0){
                    //const status = [...cell.children][0].getAttribute('class');
                    const statusElement = [...cell.children][0];
                    const status = statusElement.getAttribute('class');
                    if(status !== null){
                        item.values.push(`<span class='${status}'></span>`);
                    }
                }else{
                    item.values.push(cell.textContent);
                }

            });
            this.items.push(item);
        });

        /* console.log(this.items) */

        this.makeTable();
    }

    makeTable(){

        this.copyItems = [...this.items];
        
        this.initPagination(this.items.length, this.numberOfEntries);

        const container = document.createElement('div');
        container.id = this.element.id;
        this.element.innerHTML = '';
        this.element.replaceWith(container);
        this.element = container;

        this.createHTML();
        this.renderHeaders();
        if (this.items.length === 0) {
            this.element.querySelector('.noitems').innerHTML = `<p class="text-center">Aún no hay ${this.table}.</p>`;
            
        }else{
            this.renderRows();
        }
        this.renderPagesButtons();
        this.renderHeaderButtons();
        this.renderSearch();
        this.renderSelectEntries();

    }

    initPagination(total, entries){
        this.pagination.total = total;
        this.pagination.noItemsPerPage = entries;
        this.pagination.noPages = Math.ceil(this.pagination.total / this.pagination.noItemsPerPage);
        this.pagination.actual = 1;
        this.pagination.pointer = 0;
        this.pagination.diff = this.pagination.noItemsPerPage - (this.pagination.total % this.pagination.noItemsPerPage);
    }

    generateUUID(){
        return (Date.now() * Math.floor(Math.random() * 100000)).toString();
    }

        createHTML(){
            this.element.innerHTML = `
            <div class="datatable-container">
                <div class="header-tools">
                    <div class="tools">
                        <ul class="header-buttons-container">
                        </ul>
                    </div>
                    <div class="search">
                        <input type="text" class="search-input">
                    </div>
                </div>
                <table class="datatable">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="noitems">
                </div>
                <div class="footer-tools">
                    <div class="list-items">
                        Mostrar
                        <select name="n-entries" id="n-entries" class="n-entries">
                        </select>
                        entradas
                    </div>
                    
                    <div class="pages">
                    </div> 
                </div>
            </div>
            `
        };
        renderHeaders(){

            this.element.querySelector('thead tr').innerHTML = '';
            this.headers.forEach(header =>{
                if (header.indexOf('icon') === 0) {
                    let replace = header.replace('icon:', '');
                    this.element.querySelector('thead tr').innerHTML += `<th><i class="${replace}"></i></th> `;
                }else{
                    this.element.querySelector('thead tr').innerHTML += `<th>${header}</th> `;
                }
            });

        };
        renderRows(){
            this.element.querySelector('tbody').innerHTML = '';

            let i = 0;
            const {pointer, total} = this.pagination;
            const limit = this.pagination.actual * this.pagination.noItemsPerPage;

            for (i = pointer ; i < limit; i++) {
                if (i === total) break;

                const {id, values} = this.copyItems[i];
                const checked = this.isChecked(id);

                let data = '';

                
                

                values.forEach(cell => {
                    /* console.log(cell); */
                    if (cell.indexOf('checkbox:') != -1) {
                        data += `<td class="table-checkbox">
                            <input type="checkbox" class="datatable-checkbox" data-id="${id}" ${checked? "checked":""} />
                        </td>`;
                    }else if (cell.indexOf('icon:') !== -1 && cell.indexOf('actionlink:') !== -1) {
                        
                        let etiqueta = cell.trim().split(';');
                        etiqueta[0] = etiqueta[0].replace('actionlink:', '');
                        etiqueta[1] = etiqueta[1].replace('icon:', '');
                        etiqueta[2] = etiqueta[2].replace('name:', '');
                        etiqueta[3] = etiqueta[3].replace('id:', '');
                        
                        if (etiqueta[4].indexOf('onclick:') !== -1) {
                            etiqueta[4] = etiqueta[4].replace('onclick:', '');
                            data += `<td class="table-filas"><a title="${etiqueta[2]}" class="${etiqueta[0]}" id="${etiqueta[3]}" onclick="${etiqueta[4]}(event, this.id)"><i class="${etiqueta[1]}"></i></a></td>`;
                        }else{
                            etiqueta[4] = etiqueta[4].replace('href:', '');
                            data += `<td class="table-filas"><a title="${etiqueta[2]}" href="${etiqueta[4]}" class="${etiqueta[0]}" id="${etiqueta[3]}"><i class="${etiqueta[1]}"></i></a></td>`;
                        }


                    }else if (cell.indexOf('icon:') !== -1 && cell.indexOf('actionlink:') === -1) {
                        let etiqueta = cell.trim().split(';');
                        etiqueta[0] = etiqueta[0].replace('icon:', '');
                        etiqueta[1] = etiqueta[1].replace('name:', '')
                        data += `<td class="table-filas"><i title=${etiqueta[1]} class="${etiqueta[0]}"></i></td>`;
                    }else if (cell.indexOf('progreso:') !== -1) {
                        let etiqueta = cell.replace('progreso:', '');
                        data+= `<td>
                                <div class="progresotabla progresotabla-xs">
                                    <div class="progresotabla-bar progresotabla-bar-normal" style="width: ${etiqueta}%;"></div>
                                </div>
                                </td>`
                    }else {

                        data += `<td class="table-filas-normal">${cell}</td>`;
                    }

                });

                this.element.querySelector('tbody').innerHTML += `<tr>${data}</tr>`;

                //listener para el checkbox
                document.querySelectorAll('.datatable-checkbox').forEach(checkbox =>{
                    checkbox.addEventListener('click', e => {
                        const element = e.target;
                        const id = element.getAttribute('data-id');

                        if (element.checked) {
                            const item = this.getItem(id);

                            this.selected.push(item);
                            
                        }else{
                            this.removeSelected(id);
                        }
                    });
                });
            }
        };
        isChecked(id){
            const items = this.selected;
            let res = false;

            if (items.length === 0) return false;

            items.forEach(item =>{
                if(item.id === id) res = true;
            });

            return res;
        };

        getItem(id){
            const res = this.items.filter(item => item.id === id);
            if(res.length === 0) return null;
            return res[0];
        }

        removeSelected(id){
            const res = this.selected.filter(item => item.id !== id);
            this.selected = [...res];
        }
        renderPagesButtons(){
            const pagesContainer = this.element.querySelector('.pages');
            let pages = '';

            const buttonsToShow = this.pagination.noButtonsBeforeDots;
            const actualIndex = this.pagination.actual;

            let limI = Math.max(actualIndex - 2, 1);
            let limS =  Math.min(actualIndex + 2, this.pagination.noPages);
            const missinButtons = buttonsToShow - (limS - limI);            

            if (Math.max(limI - missinButtons, 0)) {
                limI = limI - missinButtons;
            }else if (Math.min(limS + missinButtons, this.pagination.noPages) !== this.pagination.noPages) {
                limS = limI + missinButtons;
            }

            if (limS < (this.pagination.noPages - 2)) {
                pages += this.getIteratedButton(limI, limS);
                pages += '<li>...</li>';
                pages += this.getIteratedButton(this.pagination.noPages - 1, this.pagination.noPages);
            }else{
                pages += this.getIteratedButton(limI, this.pagination.noPages);
            }

            pagesContainer.innerHTML = `<ul>${pages}</ul>`;

            this.element.querySelectorAll('.pages li button').forEach(button => {
                button.addEventListener('click', e =>{
                    this.pagination.actual = parseInt(e.target.getAttribute('data-page'));
                    this.pagination.pointer = (this.pagination.actual * this.pagination.noItemsPerPage) - this.pagination.noItemsPerPage;
                    this.renderRows();
                    this.renderPagesButtons();
                });
            });


        };
        getIteratedButton(start, end){
            let res = '';
            for(let i = start; i <= end; i++){
                if(i === this.pagination.actual){
                    res += `<li><span class="active">${i}</span></li>`;
                }else{
                    res +=  `<li><button data-page="${i}">${i}</button></li>`; 
                }
            };
            return res;
        }
        renderHeaderButtons(){
            let html = '';
            const buttonsContainer = this.element.querySelector('.header-buttons-container');
            const headerButtons = this.headerButtons;

            headerButtons.forEach(button =>{
                if (button.type === "checkbox") {
                    html += `<li><input class="inputtable" id="${button.id}" title="${button.text}" type="${button.type}"></li>`
                }else{
                    html += `<li><button class="iconostable" id="${button.id}"><i class="${button.icon}"></i>${button.text}</button></li>`
                }
            });

            buttonsContainer.innerHTML = html;

            headerButtons.forEach(button => {
                document.querySelector('#' + button.id).addEventListener('click', button.action);
            });
        };
        renderSearch(){
            this.element.querySelector('.search-input').addEventListener('input', e=>{
                const query = e.target.value.trim().toLowerCase();  
                if (this.items.length === 0) {
                    this.element.querySelector('.noitems').innerHTML = `<p class="text-center">Aún no hay ${thos.table}.</p>`;
                }else{
                if(query === ''){
                    this.element.querySelector('.noitems').innerHTML = ``;
                    this.copyItems = [...this.items];
                    this.initPagination(this.copyItems.length, this.numberOfEntries);
                    this.renderRows();
                    this.renderPagesButtons();
                    return;
                }

                this.search(query);
                if (this.copyItems.length === 0) {
                    this.element.querySelector('.noitems').innerHTML = `<p class="text-center">No se encuentran ${this.table} con la busqueda ${query}.</p>`;
                }else{
                    this.element.querySelector('.noitems').innerHTML = ``;
                }
                this.initPagination(this.copyItems.length, this.numberOfEntries);
                this.renderRows();
                this.renderPagesButtons();
                }
            });
        };

        search(query){
            let res = [];

            this.copyItems = [...this.items];

            for (let i = 0; i < this.copyItems.length; i++){
                const {id, values} = this.copyItems[i];
                const row = values;
                for(let j = 0; j < row.length; j++){
                    const cell = row[j];

                    if (cell.toLowerCase().indexOf(query) >= 0) {
                        res.push(this.copyItems[i]);
                        break;
                    }
                }
            }
            this.copyItems = [...res];
        }
        renderSelectEntries(){
            const select = this.element.querySelector('#n-entries');

            const html = [/* this.numberOfEntries, */5,10,15].reduce((acc, item) =>{
                return acc += `<option value="${item}" ${this.numberOfEntries === item? 'selected': ''}>${item}</option>`;
            }, '');

            select.innerHTML = html;

            this.element.querySelector('#n-entries').addEventListener('change', e =>{
                const numberOfEntries = parseInt(e.target.value);
                this.numberOfEntries = numberOfEntries;
                this.initPagination(this.copyItems.length, this.numberOfEntries);
                this.renderRows();
                this.renderPagesButtons();
                this.renderSearch();
            })
        };

        getSelected(){
            return this.selected;
        }

        add(item){
            const row = {
                id: this.generateUUID(),
                values:[]
            }
            /* console.log(item); */
            const status = `<span class="${item[0]}"></span>`;
            item.shift();
            row.values = [status, ...item];
            this.items = [row, ...this.items];
            this.makeTable();
        }

        


}