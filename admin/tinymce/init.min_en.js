tinymce.init({
  selector: 'textarea',
  height: 460,
  plugins: 'codesample',
  codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'}
    ],
  theme: 'modern',
plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak table',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],  
extended_valid_elements:"a[*],altglyph[*],altglyphdef[*],altglyphitem[*],animate[*],animatecolor[*],animatemotion[*],animatetransform[*],circle[*],clippath[*],color-profile[*],cursor[*],defs[*],desc[*],ellipse[*],feblend[*],fecolormatrix[*],fecomponenttransfer[*],fecomposite[*],feconvolvematrix[*],fediffuselighting[*],fedisplacementmap[*],fedistantlight[*],feflood[*],fefunca[*],fefuncb[*],fefuncg[*],fefuncr[*],fegaussianblur[*],feimage[*],femerge[*],femergenode[*],femorphology[*],feoffset[*],fepointlight[*],fespecularlighting[*],fespotlight[*],fetile[*],feturbulence[*],filter[*],font[*],font-face[*],font-face-format[*],font-face-name[*],font-face-src[*],font-face-uri[*],foreignobject[*],g[*],glyph[*],glyphref[*],hkern[*],line[*],marker[*],mask[*],metadata[*],missing-glyph[*],mpath[*],path[*],pattern[*],polygon[*],polyline[*],radialgradient[*],rect[*],script[*],set[*],stop[*],lineargradient[*],style[*],m[*],v[*],vs[*],us[*],svg[*],switch[*],symbol[*],text[*],textpath[*],title[*],tref[*],tspan[*],use[*],view[*],vkern[*],h1[*],h2[*],h3[*],h4[*],h5[*],h6[*],blockquote[*]",
 image_advtab: true,
menubar:false,
toolbar1:'newdocument preview  print  | undo  redo h1  | styleselect ',
toolbar2: 'bold italic  underline removeformat  |  forecolor backcolor forecolorpicker backcolorpicker blockquote |  copy paste charmap | table pagebreak ',
 toolbar3:' alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  tablecontrols | link unlink image media | emoticons | code | codesample fullscreen ',
  });