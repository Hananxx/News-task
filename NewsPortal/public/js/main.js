console.log('hi')
//editor
var colors = [
    "#2188ff", "#4498dc","#c70000",
    "#000791", "#0046a5", "#a70063",
    "#4a0042", "#fff", "#df0000",
    "#dc60c4", "#001937",
    "#000", "#009ead", "#005764",
];
var bgColors = [
    "#ffe080","#ffa8cf","#c70000","#a4b2ff","#ce97fb",
    "#67ebfa", "#faa99d"
];
var quill = new Quill('#editor-container', {
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline',{'color':colors}, {'background':bgColors}],
            ['image', 'video']
        ]
    },
    placeholder: '',
    theme: 'snow'  // or 'bubble'
});
quill.on('text-change', function(delta, oldDelta, source) {
    document.getElementById("textarea").value = quill.root.innerHTML;
});
