"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[7588],{4876:function(e,a,t){t.d(a,{B:function(){return s}});t(67294);var c=t(81223),n=t(45943),o=t(35944);const l=({fare:e,units:a,onClick:t,themeNameSpace:l,labels:s,viewSettings:i,className:r})=>{const{displayImages:d,showJourneyType:m,showTravelClass:p,showFareTimestamp:u,textAlignment:h,showDates:f}=i,N="center"===h,{image:v,originCity:g,originAirportCode:w,destinationCity:b,destinationAirportCode:C,formattedDepartureDate:k,formattedReturnDate:_,priceLastSeen:S,formattedTotalPrice:y,formattedTravelClass:T,formattedFlightType:x,redemption:Z={}}=e,{formattedTaxAmount:j,formattedAmount:O,taxAmount:P}=Z||{},B="label--departure-date"!==(null===s||void 0===s?void 0:s["label--departure-date"])&&""===_?"".concat((null===s||void 0===s?void 0:s["label--departure-date"])||""," ").concat(k):k,D="".concat(B," - ").concat(_),X=x,F="".concat(null===s||void 0===s?void 0:s["cmp-viewed"]," ").concat(S.value," ").concat(a[e.priceLastSeen.unit]," ").concat(null===s||void 0===s?void 0:s["cmp-time-ago"]),M=""!==_?D:B,A=Z&&O&&j,E=A?"".concat(O," + ").concat(j):"".concat(y),L="".concat(g," ").concat(w," ").concat(null===s||void 0===s?void 0:s["preposition--destination-place"]," ").concat(b," ").concat(C," ").concat(M," ").concat(null===s||void 0===s?void 0:s.fare_promo_label," ").concat(E," ").concat(u?F:""," ").concat(m?X:""," ").concat(p?T:""," ").concat(null===s||void 0===s?void 0:s.fare_call_to_action_label);return(0,o.BX)(c.kC,{className:"flex-col w-full",themeNameSpaces:[l],children:[d&&v&&(0,o.tZ)(c.kC,{className:"w-full flex-initial",children:(0,o.tZ)(c.Ee,{src:v,isOptimized:!(0,n.Dc)(v),height:170,isLazy:!0,className:"object-cover w-full h-full",themeNameSpaces:["".concat(l,"._image")],dataTest:"destination-img",alt:""})}),(0,o.BX)(c.kC,{className:"w-full flex-1 ".concat(r),themeNameSpaces:["".concat(l,"._container")],children:[(0,o.BX)(c.kC,{className:"w-full flex-col self-start pb-2 overflow-hidden ".concat(N&&"items-center text-center"),children:[(0,o.BX)(c.xv,{as:"div",className:"max-w-full pb-1 break-words",children:[(0,o.BX)(c.xv,{className:"inline",themeNameSpaces:["".concat(l,"._origin")],dataTest:"origin-text",children:["".concat(g," (").concat(w,")"),(0,o.tZ)(c.xv,{as:"span",className:"px-1",themeNameSpaces:["".concat(l,"._destinationPreposition")],children:null===s||void 0===s?void 0:s["preposition--destination-place"]})]}),(0,o.tZ)(c.xv,{className:"block",as:"span",themeNameSpaces:["".concat(l,"._destination")],dataTest:"destination-text",children:"".concat(b," (").concat(C,")")})]}),f&&(0,o.tZ)(c.kC,{themeNameSpaces:["".concat(l,"._dates")],dataTest:"departing-text",children:M})]}),(0,o.BX)(c.kC,{className:"w-full flex-col self-end ".concat(N?"justify-center":"justify-end"),children:[(0,o.tZ)(c.kC,{className:"w-full pb-2 ".concat(N?"justify-center":"justify-end"),children:(0,o.BX)(c.kC,{className:"flex-col ".concat(N?"items-center":"items-end"),children:[(0,o.tZ)(c.kC,{themeNameSpaces:["".concat(l,"._from")],children:null===s||void 0===s?void 0:s.fare_promo_label}),A?(0,o.BX)(o.HY,{children:[(0,o.tZ)(c.kC,{className:"break-all",themeNameSpaces:["".concat(l,"._price")],dataTest:"redemption-amount",children:O}),P?(0,o.tZ)(c.kC,{className:"break-all",themeNameSpaces:["".concat(l,"._priceTax")],dataTest:"redemption-tax",children:"+ ".concat(j)}):null]}):(0,o.tZ)(c.kC,{className:"break-all",themeNameSpaces:["".concat(l,"._price")],dataTest:"price",children:"".concat(O||y,"*")}),u&&(0,o.tZ)(c.kC,{themeNameSpaces:["".concat(l,"._lastSeen")],dataTest:"last-seen",children:F}),(0,o.BX)(c.kC,{className:"flex-row",children:[m&&(0,o.tZ)(c.kC,{themeNameSpaces:["".concat(l,"._journeyType")],dataTest:"flight-type",children:X}),m&&p&&""!==T&&(0,o.tZ)(c.kC,{className:"px-1",themeNameSpaces:["".concat(l,"._separator")],children:null===s||void 0===s?void 0:s["cmp-separator"]}),p&&(0,o.tZ)(c.kC,{themeNameSpaces:["".concat(l,"._travelClass")],dataTest:"travel-class",children:T})]})]})}),(0,o.tZ)(c.kC,{className:"w-full",children:(0,o.tZ)(c.zx,{className:"w-full",themeNameSpaces:["".concat(l,"._cta")],onClick:t,dataTest:"book-now",ariaLabel:L,ariaHasPopup:"dialog",children:null===s||void 0===s?void 0:s.fare_call_to_action_label})})]})]})]})};l.defaultProps={viewSettings:{displayImages:!0,showJourneyType:!0,showTravelClass:!0,showFareTimestamp:!0,textAlignment:"standard"},className:""};var s=l},3222:function(e,a,t){t.d(a,{Z:function(){return i}});var c=t(67294),n=t(81223),o=t(47428),l=t(35944);const s=({loading:e,fetchMoreFunc:a,themeNameSpaces:t})=>{const{labels:s}=(0,c.useContext)(o.Z);return e&&t.push("".concat(t[0],".__disabled")),(0,l.tZ)(n.zx,{onClick:()=>a(),themeNameSpaces:t,isDisabled:e,dataTest:"view-more",children:e?(0,l.tZ)(n.kC,{className:"justify-center",children:(0,l.tZ)(n.$j,{})}):null===s||void 0===s?void 0:s.load_more_pagination_label})};s.defaultProps={loading:!1,fetchMoreFunc:()=>{},themeNameSpaces:[]};var i=s},37588:function(e,a,t){t.r(a);var c=t(92809),n=(t(67294),t(81223)),o=t(3222),l=t(4876),s=t(35944);function i(e,a){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);a&&(c=c.filter((function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable}))),t.push.apply(t,c)}return t}function r(e){for(var a=1;a<arguments.length;a++){var t=null!=arguments[a]?arguments[a]:{};a%2?i(Object(t),!0).forEach((function(a){(0,c.Z)(e,a,t[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):i(Object(t)).forEach((function(a){Object.defineProperty(e,a,Object.getOwnPropertyDescriptor(t,a))}))}return e}const d=({siteEdition:e,fares:a,onFareClick:t,units:c,mainThemeNameSpace:i,themeNameSpace:d,fetchMoreFares:m,labels:p,isRtl:u,viewSettings:h,networkStatus:f})=>{const{showLoadMorePagination:N,numberOfColumns:v}=h,g={1:{className:"grid-cols-1"},2:{className:"grid-cols-2"},3:{className:"grid-cols-3"},4:{className:"grid-cols-4"}};return(0,s.BX)(s.HY,{children:[(0,s.tZ)(n.kC,{className:"grid grid-cols-1 md:".concat(g[v].className," lg:").concat(g[v].className," gap-4"),themeNameSpaces:["".concat(i,"._container")],children:a.map((a=>(0,s.tZ)(n.kC,{className:"w-full",dataTest:"card-container",children:(0,s.tZ)(l.B,{fare:a,units:c,onClick:()=>t({original:r({siteEdition:e},a)}),themeNameSpace:"".concat(d,"._card"),labels:p,isRtl:u,viewSettings:h})})))}),N&&(0,s.tZ)(n.kC,{className:"flex-row justify-center",children:(0,s.tZ)(o.Z,{loading:"fetchMore"===f,fetchMoreFunc:m,themeNameSpaces:["".concat(d,"._loadMoreCta")]})})]})};d.defaultProps={viewSettings:{showLoadMorePagination:!0,showJourneyType:!0,showTravelClass:!0,showFareTimestamp:!0,numberOfColumns:4}},a.default=d}}]);